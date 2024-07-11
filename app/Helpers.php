<?php

function theme_view($path, $values = array())
{
    $theme = config('app.theme');
    $full_path = 'templates.' . $theme . '.' . $path;
    return view($full_path, $values);
}

function theme_asset($path)
{
    $theme = config('app.theme');
    $file_path = 'assets/' . $theme . '/' . $path;

    return asset($file_path);
}

function theme_include($path, $values = array())
{
    $theme = config('app.theme');
    $full_path = 'templates.' . $theme . '.' . $path;
    return view($full_path, $values);
}

function getIpClient()
{
    try {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
    } catch (\Exception $e) {
        $ip = null;
    }

    return $ip;
}


/////ví dụ: create, list, edit...
function allow($name_of_permission)
{
    if (auth()->user()->hasPermissionTo($name_of_permission)) {
        return true;
    } else {
        return false;
    }
}

function actionList($action, $model, array $ids)
{
    if (!$action || !$model || !count($ids)) {
        return false;
    } else {
        try {
            if ($action == 'on') {
                if (in_array('status', $model->getFillable())) {
                    $model->whereIn('id', $ids)->update(['status' => 1]);
                }
            }
            if ($action == 'off') {
                if (in_array('status', $model->getFillable())) {
                    $model->whereIn('id', $ids)->update(['status' => 0]);
                }
            }

            if ($action == 'approved') {
                if (in_array('approved', $model->getFillable())) {
                    $model->whereIn('id', $ids)->update(['approved' => 1]);
                }
            }

            if ($action == 'unapproved') {
                if (in_array('approved', $model->getFillable())) {
                    $model->whereIn('id', $ids)->update(['approved' => 0]);
                }
            }

            if ($action == 'delete') {
                $model->whereIn('id', $ids)->delete();
            }
            return 'SUCCESS';
        } catch (\Exception $e) {
            return false;
        }
    }

}

///Lấy symbol của tiền tệ
function priceWithSymbol($price, $currency_id)
{

    if ($price) {
        $currency = cache()->remember('currency_' . $currency_id, 10, function () use ($currency_id) {
            return \App\Modules\Currency\Models\Currencies::find($currency_id);
        });

        if ($currency) {
            if ($currency->symbol_left) {
                $amount = $currency->symbol_left . number_format($price);
            } else {
                $amount = number_format($price) . $currency->symbol_right;
            }

            return $amount;
        } else {
            return null;
        }
    }

}

///Encrypt
function encryptcode($key, $string)
{
    $newEncrypter = new \Illuminate\Encryption\Encrypter(base64_decode($key), 'AES-256-CBC');
    return $newEncrypter->encrypt($string);
}

//Decrypt
function decryptcode($key, $string)
{
    $newEncrypter = new \Illuminate\Encryption\Encrypter(base64_decode($key), 'AES-256-CBC');
    return $newEncrypter->decrypt($string);
}
