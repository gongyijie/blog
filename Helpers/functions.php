<?php
/**
 * 页面json 输出
 *
 * @param int $code
 * @param $msg
 * @param $paras
 */
function responseToJson($code = 0, $msg = '', $paras = null)
{
    $res["code"] = $code;
    $res["msg"] = $msg;
    // if (!empty($paras)) {
    $res["result"] = $paras;
    // }
    return response()->json($res);
}
