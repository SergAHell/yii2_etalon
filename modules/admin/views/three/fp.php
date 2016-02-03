<style>
    canvas {
        width: 100%;
        height: 100%;
        border: 1px solid black;
    }
</style>
<script src="/js/three.min.js"></script> <!-- Get the latest version of the Three.js library. -->
<script src="http://threejs.org/examples/js/TypedArrayUtils.js"></script>
<script src="http://threejs.org/examples/js/controls/FirstPersonControls.js"></script>
<div id="viewer" style="width: 1650px; height: 800px; border: 1px #000 solid;"></div>

<script type="x-shader/x-vertex" id="vertexshader">

			//uniform float zoom;

			attribute float alpha;

			varying float vAlpha;

			void main() {

				vAlpha = 1.0 - alpha;

				vec4 mvPosition = modelViewMatrix * vec4( position, 1.0 );

				gl_PointSize = 4.0 * ( 300.0 / length( mvPosition.xyz ) );

				gl_Position = projectionMatrix * mvPosition;

			}

		</script>

<script type="x-shader/x-fragment" id="fragmentshader">

			uniform sampler2D tex1;

			varying float vAlpha;

			void main() {

				gl_FragColor = texture2D(tex1, gl_PointCoord);
				gl_FragColor.r = (1.0 - gl_FragColor.r) * vAlpha + gl_FragColor.r;

			}

		</script>
<script>

    var width = 1650;
    var height = 800;
    var viewer = document.getElementById( 'viewer' );
    console.log(viewer);

    var camera, scene, renderer;
    var geometry, mesh;
    var controls;

    var objects = [];

    var amountOfParticles = 500000, maxDistance = Math.pow(100000, 2);
    var positions, alphas, particles, _particleGeom;

    var clock = new THREE.Clock();

    var blocker = document.getElementById( 'blocker' );
    var instructions = document.getElementById( 'instructions' );


    function init() {

        camera = new THREE.PerspectiveCamera(75, width / height, 1, 1000000);

        scene = new THREE.Scene();

        controls = new THREE.FirstPersonControls( camera );
        controls.movementSpeed = 100;
        controls.lookSpeed = 0.1;

        var materials = [

            new THREE.MeshBasicMaterial( { map: THREE.ImageUtils.loadTexture( '/img/px.jpg' ) } ), // right
            new THREE.MeshBasicMaterial( { map: THREE.ImageUtils.loadTexture( '/img/nx.jpg' ) } ), // left
            new THREE.MeshBasicMaterial( { map: THREE.ImageUtils.loadTexture( '/img/py.jpg' ) } ), // top
            new THREE.MeshBasicMaterial( { map: THREE.ImageUtils.loadTexture( '/img/ny.jpg' ) } ), // bottom
            new THREE.MeshBasicMaterial( { map: THREE.ImageUtils.loadTexture( '/img/pz.jpg' ) } ), // back
            new THREE.MeshBasicMaterial( { map: THREE.ImageUtils.loadTexture( '/img/nz.jpg' ) } )  // front

        ];

        mesh = new THREE.Mesh( new THREE.BoxGeometry( 10000, 10000, 10000, 7, 7, 7 ), new THREE.MeshFaceMaterial( materials ) );
        mesh.scale.x = - 1;
        scene.add(mesh);

        //

        renderer = new THREE.WebGLRenderer(); // Detector.webgl? new THREE.WebGLRenderer(): new THREE.CanvasRenderer()
        renderer.setPixelRatio( window.devicePixelRatio );
        renderer.setSize( width, height );
        //document.body.appendChild( renderer.domElement );
        document.getElementById( 'viewer' ).appendChild(renderer.domElement);

        // create the custom shader
        var imagePreviewTexture = THREE.ImageUtils.loadTexture( '/img/crate.gif');
        imagePreviewTexture.minFilter = THREE.LinearMipMapLinearFilter;
        imagePreviewTexture.magFilter = THREE.LinearFilter;

        pointShaderMaterial = new THREE.ShaderMaterial( {
            uniforms: {
                tex1: { type: "t", value: imagePreviewTexture },
                zoom: { type: 'f', value: 9.0 },
            },
            vertexShader:   document.getElementById( 'vertexshader' ).textContent,
            fragmentShader: document.getElementById( 'fragmentshader' ).textContent,
            transparent: true
        });


        //create particles with buffer geometry
        var distanceFunction = function(a, b){
            return Math.pow(a[0] - b[0], 2) +  Math.pow(a[1] - b[1], 2) +  Math.pow(a[2] - b[2], 2);
        };

        positions = new Float32Array( amountOfParticles * 3 );
        alphas = new Float32Array( amountOfParticles );

        _particleGeom = new THREE.BufferGeometry();
        _particleGeom.addAttribute( 'position', new THREE.BufferAttribute( positions, 3 ) );
        _particleGeom.addAttribute( 'alpha', new THREE.BufferAttribute( alphas, 1 ) );

        particles = new THREE.Points( _particleGeom, pointShaderMaterial );

        for (var x = 0; x < amountOfParticles; x++) {
            positions[ x * 3 + 0 ] = Math.random() * 1000;
            positions[ x * 3 + 1 ] = Math.random() * 1000;
            positions[ x * 3 + 2 ] = Math.random() * 1000;
            alphas[x] = 1.0;
        }


        var measureStart = new Date().getTime();

        // creating the kdtree takes a lot of time to execute, in turn the nearest neighbour search will be much faster
        kdtree = new THREE.TypedArrayUtils.Kdtree( positions, distanceFunction, 3 );

        console.log('TIME building kdtree', new Date().getTime() - measureStart);

        // display particles after the kd-tree was generated and the sorting of the positions-array is done
        scene.add(particles);

        window.addEventListener( 'resize', onWindowResize, false );

    }

    function onWindowResize() {

        camera.aspect = width / height;
        camera.updateProjectionMatrix();

        renderer.setSize( width, height );

        controls.handleResize();
    }

    function animate() {

        requestAnimationFrame( animate );

        //
        displayNearest(camera.position);

        controls.update( clock.getDelta() );

        renderer.render( scene, camera );

    }

    function displayNearest(position) {

        // take the nearest 200 around him. distance^2 'cause we use the manhattan distance and no square is applied in the distance function
        var imagePositionsInRange = kdtree.nearest([position.x, position.y, position.z], 100, maxDistance);

        // We combine the nearest neighbour with a view frustum. Doesn't make sense if we change the sprites not in our view... well maybe it does. Whatever you want.
        var _frustum = new THREE.Frustum();
        var _projScreenMatrix = new THREE.Matrix4();
        camera.matrixWorldInverse.getInverse( camera.matrixWorld );

        _projScreenMatrix.multiplyMatrices( camera.projectionMatrix, camera.matrixWorldInverse );
        _frustum.setFromMatrix( _projScreenMatrix );

        for ( i = 0, il = imagePositionsInRange.length; i < il; i ++ ) {
            var object = imagePositionsInRange[i];
            var objectPoint = new THREE.Vector3().fromArray( object[ 0 ].obj );

            if (_frustum.containsPoint(objectPoint)){

                var objectIndex = object[0].pos;

                // set the alpha according to distance
                alphas[ objectIndex ] = 1.0 / maxDistance * object[1];
                // update the attribute
                _particleGeom.attributes.alpha.needsUpdate = true;
            }
        }
    }


    init();
    animate();
</script>

