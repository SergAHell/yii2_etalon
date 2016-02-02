<style>
    canvas {
        width: 100%;
        height: 100%;
        border: 1px solid black;
    }
</style>
<h1>Liquid Three.js Cube</h1>
<p>Change the browser's window size.</p>
<script src="/js/three.min.js"></script> <!-- Get the latest version of the Three.js library. -->
<div id="viewer" style="width: 1500px; height: 700px; border: 1px #000 solid;"></div>
<script>
    var width = 1500;
    var height = 700;
    var viewer = document.getElementById( 'viewer' );
    console.log(viewer);

    var scene = new THREE.Scene(); // Create a Three.js scene object.
    var camera = new THREE.PerspectiveCamera(100, width/height, 0.20, 100); // Define the perspective camera's attributes.

    var renderer = window.WebGLRenderingContext ? new THREE.WebGLRenderer() : new THREE.CanvasRenderer(); // Fallback to canvas renderer, if necessary.
    renderer.setSize(width, height); // Set the size of the WebGL viewport.



    document.getElementById( 'viewer' ).appendChild(renderer.domElement);

    var geometry = new THREE.SphereGeometry(30,40,60); // Create a 20 by 20 by 20 cube.
//    var material = new THREE.MeshBasicMaterial({ color: 0xF000FF }); // Skin the cube with 100% blue.


    var material = new THREE.MeshBasicMaterial( { color: 0xffaa00, transparent: true, blending: THREE.AdditiveBlending } );
    var cube = new THREE.Mesh(geometry, material); // Create a mesh based on the specified geometry (cube) and material (blue skin).
    scene.add(cube); // Add the cube at (0, 0, 0).

    camera.position.z = 40; // Move the camera away from the origin, down the positive z-axis.

    var render = function () {
        cube.rotation.x += 0.02; // Rotate the sphere by a small amount about the x- and y-axes.
        cube.rotation.y += 0.03;
        cube.rotation.z -= 0.05;




        renderer.render(scene, camera); // Each time we change the position of the cube object, we must re-render it.
        requestAnimationFrame(render); // Call the render() function up to 60 times per second (i.e., up to 60 animation frames per second).
    };

    render(); // Start the rendering of the animation frames.

</script>

