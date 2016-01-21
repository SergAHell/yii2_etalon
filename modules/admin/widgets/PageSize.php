<?php
namespace app\modules\admin\widgets;
use yii\helpers\Html;
/**
 * PageSize widget is an addition to the \yii\grid\GridView that enables
 * changing the size of a page on GridView.
 *
 * To use this widget with a GridView, add this widget to the page:
 *
 * ~~~
 * <?php echo \nterms\PageSize::widget(); ?>
 * ~~~
 *
 * and set the `filterSelector` property of GridView as shown in
 * following example.
 *
 * ~~~
 * <?= GridView::widget([
 *      'dataProvider' => $dataProvider,
 *      'filterModel' => $searchModel,
 * 		'filterSelector' => 'select[name="per-page"]',
 *      'columns' => [
 *          ...
 *      ],
 *  ]); ?>
 * ~~~
 *
 * Please note that `per-page` here is the string you use for `pageSizeParam` setting of the PageSize widget.
 *
 * @author Saranga Abeykoon <amisaranga@gmail.com>
 * @since 1.0
 */
class PageSize extends \yii\base\Widget
{
    /**
     * @var string the label text.
     */
    public $label = 'Показывать по';

    /**
     * @var integer the defualt page size. This page size will be used when the $_GET['per-page'] is empty.
     */
    public $defaultPageSize = 50;

    /**
     * @var string the name of the GET request parameter used to specify the size of the page.
     * This will be used as the input name of the dropdown list with page size options.
     */
    public $pageSizeParam = 'per-page';

    /**
     * @var array the list of page sizes
     */
    public $sizes = [50 => 50, 200 => 200];

    /**
     * @var string the template to be used for rendering the output.
     */
    public $template = '{label} {list}';

    /**
     * @var array the list of options for the drop down list.
     */
    public $options = ['class' => 'form-control', 'style' => 'width: 70px; display: inline-block;'];

    /**
     * @var array the list of options for the label
     */
    public $labelOptions = ['class' => 'control-label'];

    /**
     * @var boolean whether to encode the label text.
     */
    public $encodeLabel = true;

    /**
     * Runs the widget and render the output
     */
    public function run()
    {
        if(empty($this->options['id'])) {
            $this->options['id'] = $this->id;
        }

        if($this->encodeLabel) {
            $this->label = Html::encode($this->label);
        }

        $perPage = !empty($_GET[$this->pageSizeParam]) ? $_GET[$this->pageSizeParam] : 0;
        if (!$perPage) {
            $perPage = !empty($_SESSION['per-page']) ? $_SESSION['per-page'] : $this->defaultPageSize;
        }

        $listHtml = Html::dropDownList('per-page', $perPage, $this->sizes, $this->options);
        $labelHtml = Html::label($this->label, $this->options['id'], $this->labelOptions);

        $output = str_replace(['{list}', '{label}'], [$listHtml, $labelHtml], $this->template);

        return '<div class="pull-right">' . $output . '</div>';
    }
}