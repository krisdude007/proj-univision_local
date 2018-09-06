<?php

class FTPUtility {

    // quick n dirty
    public static function transfer($secure = false, $fileLocal, $fileRemote) {
        set_time_limit(600);
        // set up basic connection
        if (!$secure) {
            $conn_id = ftp_connect(Yii::app()->params['ftp']['server'], Yii::app()->params['ftp']['port']);
        } else {
            $conn_id = ftp_ssl_connect(Yii::app()->params['ftp']['server'], Yii::app()->params['ftp']['port']);
        }

        if (!$conn_id) {
            Yii::app()->user->setFlash('error', "Unable to establish FTP connection!");
            return false;
        }

        // login with username and password
        $login_result = ftp_login($conn_id, Yii::app()->params['ftp']['user'], Yii::app()->params['ftp']['pass']);

        // check connection
        if (!$login_result) {
            Yii::app()->user->setFlash('error', "Unable to login into ftp server with provided credentials!");
            return false;
        }

        // try to change the directory to somedir
        if (Yii::app()->params['ftp']['uploadPath'] != '') {
            if (!ftp_chdir($conn_id, Yii::app()->params['ftp']['uploadPath'])) {
                Yii::app()->user->setFlash('error', "Could not change FTP directory.");
                // close the FTP stream
                ftp_close($conn_id);
                return false;
            }
        }

        if (Yii::app()->params['video']['allowMxfUploadToNetwork']) {
            if (($pos = strrpos($fileRemote, '.')) !== false)
                $fileExt = substr($fileRemote, $pos + 1);

            if ($fileExt == 'mxf') {
                if (Yii::app()->params['ftp']['uploadPath'] != '') {
                    if (!ftp_chdir($conn_id, Yii::app()->params['ftp']['uploadPathMxf'])) {
                        Yii::app()->user->setFlash('error', "Could not change FTP directory for mxf.");
                        // close the FTP stream
                        ftp_close($conn_id);
                        return false;
                    }
                }
            }
        }
        // turn passive mode on
        ftp_pasv($conn_id, Yii::app()->params['ftp']['passive']);

        // upload the file
        $upload = @ftp_put($conn_id, $fileRemote, $fileLocal, FTP_BINARY);

        // check upload status
        if (!$upload) {
            Yii::app()->user->setFlash('error', "FTP upload has failed!");
            // close the FTP stream
            ftp_close($conn_id);
            return false;
        } else {
            //echo "Uploaded $fileLocal to $ftp_server as $destination_file";
            Yii::app()->user->setFlash('success', "File was uploaded successfully!");
            // close the FTP stream
            ftp_close($conn_id);
            return true;
        }
    }

}
