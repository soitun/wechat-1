<?php

/*
 * This file is part of the overtrue/wechat.
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\Payment\Merchant;

use EasyWeChat\Payment\Kernel\BaseClient;

/**
 * Class Client.
 *
 * @author mingyoung <mingyoungcheung@gmail.com>
 */
class Client extends BaseClient
{
    /**
     * Add sub-merchant.
     *
     * @param array $params
     *
     * @return \Psr\Http\Message\ResponseInterface|\EasyWeChat\Kernel\Support\Collection|array|object|string
     */
    public function addSubMerchant(array $params)
    {
        return $this->manage($params, ['action' => 'add']);
    }

    /**
     * Query sub-merchant by merchant id.
     *
     * @param string $id
     *
     * @return \Psr\Http\Message\ResponseInterface|\EasyWeChat\Kernel\Support\Collection|array|object|string
     */
    public function querySubMerchantByMerchantId(string $id)
    {
        $params = [
            'micro_mch_id' => $id,
        ];

        return $this->manage($params, ['action' => 'query']);
    }

    /**
     * Query sub-merchant by wechat id.
     *
     * @param string $id
     *
     * @return \Psr\Http\Message\ResponseInterface|\EasyWeChat\Kernel\Support\Collection|array|object|string
     */
    public function querySubMerchantByWeChatId(string $id)
    {
        $params = [
            'recipient_wechatid' => $id,
        ];

        return $this->manage($params, ['action' => 'query']);
    }

    /**
     * @param array $params
     * @param array $query
     *
     *@return \Psr\Http\Message\ResponseInterface|\EasyWeChat\Kernel\Support\Collection|array|object|string
     */
    protected function manage(array $params, array $query)
    {
        return $this->safeRequest('secapi/mch/submchmanage', $params, 'post', compact('query'));
    }
}
