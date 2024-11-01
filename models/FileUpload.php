<?php

namespace app\models;

use Yii;
use yii\base\Model;

class FileUpload extends Model
{
    public $file;

    public function rules()
    {
        return [
            [['file'], 'required'],
            [['file'], 'file', 'extensions' => 'png, jpg, jpeg, pdf', 'maxSize' => 1024 * 1024 * 2],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $filePath = 'uploads/' . $this->file->baseName . '.' . $this->file->extension;
            $this->file->saveAs($filePath);
            return true;
        } else {
            return false;
        }
    }
}