<?php

use yii\helpers\Html;
use common\themes\admin\widgets\ActiveForm;
use yii\bootstrap\Tabs;
use common\modules\users\models\User;
use common\modules\filemanager\widgets\Image;
use andreosoft\summernote\Summernote;
?>

<?php

$form = ActiveForm::begin(['options' => [
                'enctype' => 'multipart/form-data',
                'boxTitle' => $options['title'],
                'buttonUndo' => $options['buttonUndo']
        ]]);
?>
<?= 
Tabs::widget([
    'options' => [
        'class' => 'nav-tabs-custom',
    ],
    'items' => [
        [
            'label' => \Yii::t('users/main', 'Main'),
            'content' => 
                $form->field($model, 'username')->textInput(['maxlength' => 255]).
                $form->field($model, 'email')->textInput(['maxlength' => 255]).
                $form->field($model, 'status')->dropDownList(User::getStatusArray()).
                $form->field($model, 'role')->dropDownList(User::getRoleArray()).
                Html::a('Изменить пароль', ['new-password', 'id' => $model->id], ['class' => 'btn btn-primary'])
 //               $form->field($model, 'password')->textInput(['maxlength' => 255])
        ], 
        [
            'label' => \Yii::t('users/main', 'Profile'),
            'content' => 
                $form->field($modelProfile, 'fullname')->textInput(['maxlength' => 255]).
                $form->field($modelProfile, 'phone')->textInput(['maxlength' => 255]).
                $form->field($modelProfile, 'website')->textInput(['maxlength' => 255]).
                $form->field($modelProfile, 'skype')->textInput(['maxlength' => 255]).
                $form->field($modelProfile, 'image')->widget(Image::className())
        ],
        [
            'label' => \Yii::t('users/main', 'Adress'),
            'content' => 
                $form->field($modelProfile, 'country')->textInput(['maxlength' => 255]).
                $form->field($modelProfile, 'state')->textInput(['maxlength' => 255]).
                $form->field($modelProfile, 'zip')->textInput(['maxlength' => 255]).
                $form->field($modelProfile, 'city')->textInput(['maxlength' => 255]).
                $form->field($modelProfile, 'address')->textInput(['maxlength' => 255]).
                $form->field($modelProfile, 'geopoint_latitude')->textInput(['maxlength' => 255]).
                $form->field($modelProfile, 'geopoint_longitude')->textInput(['maxlength' => 255])
        ],
        [
            'label' => \Yii::t('users/main', 'About'),
            'content' => 
                $form->field($modelProfile, 'about')->widget(Summernote::className(), ['editorOptions' => ['height' => 200,]])
        ]       
    ]
]); 
?>

<?php ActiveForm::end(); ?>

