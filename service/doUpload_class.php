<?php

/**
 * Description:
 * Created by PhpStorm.
 * User: Shinelon
 * Date: 2016/5/26
 * Time: 22:49
 */
class doUpload_class
{
    /**
     * @var string
     */
    private $fileName;
    /**
     * @var int
     */
    private $maxSize;
    /**
     * @var string
     */
    private $savaFile;
    /**
     * @var array
     */
    private $allowTypes;
    /**
     * @var bool
     */
    private $isImage;
    /**
     * @var string
     */
    private $error;
    /**
     * @var string
     */
    private $ext;

    public function __construct($fileName = "file", $maxSize = 10485760, $savaFile = "../files", $allowTypes = array("jpg", "png", "bmp", "jpeg", "gif"), $isImage = true)
    {

        $this->fileName = $fileName;
        $this->maxSize = $maxSize;
        $this->savaFile = $savaFile;
        $this->allowTypes = $allowTypes;
        $this->isImage = $isImage;
        $this->fileInfo = $_FILES[$this->fileName];
    }

    public function upload()
    {
        if ($this->checkError() && $this->checkSize() && $this->checkType() && $this->checkImage() && $this->checkUpByPost()) {
            //存储目录不存在则创建目录
            echo $this->savaFile;
            if (!file_exists($this->savaFile)) {
                mkdir($this->savaFile, 0777, true);
                chmod($this->savaFile, 0777);
            }
            //创建唯一的文件名
            $newName = md5(uniqid(microtime(true), true)) . "." . $this->ext;
            //把上传的文件移动到指定位置
            if (move_uploaded_file($this->fileInfo['tmp_name'], $this->savaFile . "/" . $newName)) {
                echo "文件上传成功！";
            } else {
                echo "文件上传失败！";
            }
        } else {
            $this->showError();
        }
    }

    private function checkError()
    {
        if ($this->fileInfo['error'] == 0) {
            return true;
        } else {
            switch ($this->fileInfo['error']) {
                case 1:
                    $this->error = "上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值";
                    break;
                case 2:
                    $this->error = "上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值";
                    break;
                case 3:
                    $this->error = "文件只有部分被上传";
                    break;
                case 4:
                    $this->error = "没有文件被上传";
                    break;
                case 6:
                    $this->error = "找不到临时文件夹";
                    break;
                case 7:
                case 8:
                    $this->error = "系统错误";
                    break;
                default:
                    $this->error = "未知错误";
                    break;

            }
            return false;
        }

    }

    private function checkSize()
    {
        if ($this->fileInfo['size'] > $this->maxSize) {
            $this->error = "文件大小超过设定值";
            return false;
        }
        return true;
    }

    private function showError()
    {
        echo $this->error;
    }

    private function checkType()
    {
        $this->ext = pathinfo($this->fileInfo['name'], PATHINFO_EXTENSION);
        var_dump($this->ext);
        if (!in_array($this->ext, $this->allowTypes)) {
            $this->error = "不是允许的文件格式";
            return false;
        }
        return true;
    }

    private function checkImage()
    {
        if (!getimagesize($this->fileInfo['tmp_name'])) {
            $this->error = "不是真正的图片文件";
            return false;
        }
        return true;
    }

    private function checkUpByPost()
    {
        if (!is_uploaded_file($this->fileInfo['tmp_name'])) {
            $this->error = "不是通过HTTP POST上传";
            return false;
        }
        return true;
    }

}