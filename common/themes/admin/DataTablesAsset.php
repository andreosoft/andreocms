<?php

namespace common\themes\admin;

use yii\web\AssetBundle;

/**
 * Theme data tables asset bundle.
 */
class DataTablesAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@common/themes/admin/assets';

    /**
     * @inheritdoc
     */
    public $css = [
        'plugins/datatables/dataTables.bootstrap.css'
    ];
    
    public $js = [
        'plugins/datatables/jquery.dataTables.js',
        'plugins/datatables/dataTables.bootstrap.js',
        
    ];
    /**
     * @inheritdoc
     */
    public $depends = [
        'common\themes\admin\ThemeAsset'
    ];
}
