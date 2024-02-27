<?php

class Upload{
    public function send($name, array|string $extensions){
        $dir=__DIR__ . '/../../public/';
        $upload = new \Proginow\FileUpload\FileUpload();
        $upload->withTargetDirectory($dir.'uploads');
        $upload->from($name);
        $upload->withAllowedExtensions($extensions);

        try {
            $uploadedFile = $upload->save();

            $r=str_replace($uploadedFile->getPath(), $dir, '');
        } catch (\Proginow\FileUpload\Throwable\InputNotFoundException $e) {
            $r=false;
        } catch (\Proginow\FileUpload\Throwable\InvalidFilenameException $e) {
            $r=false;
        } catch (\Proginow\FileUpload\Throwable\InvalidExtensionException $e) {
            $r=false;
        } catch (\Proginow\FileUpload\Throwable\FileTooLargeException $e) {
            $r=false;
        } catch (\Proginow\FileUpload\Throwable\UploadCancelledException $e) {
            $r=false;
        }

        return $r;
    }

    public function exist($name){
        $dir=__DIR__ . '/../../public/uploads/';
        return file_exists($dir.$name);
    }
}

?>