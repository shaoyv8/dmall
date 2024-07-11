<?php
/**
 * 福建瑞享云图网络科技有限公司
 * Author: flynn
 * Date: 2024/4/24
 */


namespace shaoyv8\dmall\Ware;


use shaoyv8\dmall\Api;

class Ware extends Api
{
    
    
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function dmall_ware_basic_create($data)
    {
        $params = [];
        return $this->request('/dmall/ware/basic/create',$params);
    }

    /** 
     * 按编码查询⻔店商品信息，单个或批量
     * @param $data
     * @return mixed
     * @throws \shaoyv8\dmall\HttpException
     * @author: flynn
     * @Time: 2024/6/27
     * dmall.ware.query
     */
    public function dmall_ware_query ($data)
    {
        $params = [
            'trace_id'=>'',
            'shop_code'=>'',
            'sku_bar_code'=>'',
        ];
        return $this->request('/ware/query',$params);
    }

    /**  
     * 通过商家和物料码集合查询商品信息
     * @param $data
     * @return mixed
     * @throws \shaoyv8\dmall\HttpException
     * @author: flynn
     * @Time: 2024/6/27 
     * dmall.ware.getWareExtInfoByVenderIdAndRfIds
     */
    public function dmall_ware_getWareExtInfoByVenderIdAndRfIds ($data)
    {
        $params = [
            'rfIds' => [],
            'venderId' => '',
            'trace_id' => '',
            'shop_code' => '',
        ];
        return $this->request('/ware/getWareExtInfoByVenderIdAndRfIds',$params);
    }

    /**
     * 商品名称模糊查询⻔店商品信息
     * @param $data
     * @return mixed
     * @throws \shaoyv8\dmall\HttpException
     * @author: flynn
     * @Time: 2024/6/27
     * dmall.ware.get
     */
    public function dmall_ware_get ($data)
    {
        $params = [
            'trace_id' => '',
            'sku_name' => '',
            'shop_code' => '',
        ];
        return $this->request('/ware/get',$params);
    }

    /** 
     * 根据商家id和商品编码列表批量查询商品扩展信息
     * @param $data
     * @return mixed
     * @throws \shaoyv8\dmall\HttpException
     * @author: flynn
     * @Time: 2024/6/27  
     *  dmall.ware.sku.getWareExtInfoByVenderIdAndRfIds
     */
    public function dmall_ware_sku_getWareExtInfoByVenderIdAndRfIds ($data)
    {
        $params = [
            'rfIds'     => [],
            'venderId'  => '',
            'trace_id'  => '',
            'shop_code' => '',
        ];
        return $this->request('/dmall/ware/sku/getWareExtInfoByVenderIdAndRfIds',$params);
    }

    /** 
     * 商家品牌同步
     * @param $data
     * @return mixed
     * @throws \shaoyv8\dmall\HttpException
     * @author: flynn
     * @Time: 2024/6/27
     * dmall.ware.brand.upsert
     */
    public function dmall_ware_brand_upsert ($data)
    {
        $params = [
            'data' => [
                'brand_code' => '',
                'brand_name' => '',
                'status'     => '',
            ],
            'trace_id' => '',
        ];
        return $this->request('/dmall/ware/brand/upsert',$params);
    }

    /** 
     * 店品上下架接口
     * @param $data
     * @return mixed
     * @throws \shaoyv8\dmall\HttpException
     * @author: flynn
     * @Time: 2024/6/27 
     *  dmall.ware.storeitem.publish
     */
    public function dmall_ware_storeitem_publish  ($data)
    {
        $params = [
            'trace_id'          =>'',
            'source'            =>'',
            'oper_type'         =>'',
            'expect_time'       =>'',
            'publish_list'      =>[],
            'submit_user_id'    =>'',
            'submit_user_name'  =>'',
        ];
        return $this->request('/dmall/ware/storeitem/publish',$params);
    }

    /** 
     * 已上架商品清单分页查询
     * @param $data
     * @return mixed
     * @throws \shaoyv8\dmall\HttpException
     * @author: flynn
     * @Time: 2024/6/27 
     * dmall.ware.storeitem.pagePublishedWare
     */
    public function dmall_ware_storeitem_pagePublishedWare ($data)
    {
        $params = [
            'trace_id'  =>'',
            'shop_code' =>'',
            'page'      =>'',
            'size'      =>'',

        ];
        return $this->request('/dmall/ware/storeitem/pagePublishedWare',$params);
    }

    /** 
     * 根据商家id和skuId集合查询品类、商家小分类的按级次返回的品类对象 每个商家限流访问 200次/分钟
     * @param $data
     * @return mixed
     * @throws \shaoyv8\dmall\HttpException
     * @author: flynn
     * @Time: 2024/6/27
     * dmall.ware.catframework.query
     */
    public function dmall_ware_catframework_query($data)
    {
        $params = [
            'trace_id'  =>'',
            'type'      =>'',
            'shop_type' =>'',
            'skuIds'    =>'',
        ];
        return $this->request('/dmall/ware/catframework/query',$params);
    }

    /** 
     * 同步线上商品至发布审核单据
     * @param $data
     * @return mixed
     * @throws \shaoyv8\dmall\HttpException
     * @author: flynn
     * @Time: 2024/6/27
     * dmall.online.ware.sync
     */
    public function dmall_online_ware_sync ($data)
    {
        $params = [
            'data'      =>[
                'matnr'                     =>'',
                'ware_ware_data'            =>[
                        'category_id'           =>'',
                        'title'                 =>'',
                        'key_attributes'        =>[
                            'attr_code_key'         =>'',
                            'attr_code_value'       =>'',
                            'attr_value_key'        =>'',
                            'attr_value_value'      =>'',
                        ],
                        'brand_id'              =>'',
                        'matkl'                 =>'',
                        'mwskz'                 =>'',
                        'mwskz_name'            =>'',
                        'brgew'                 =>'',
                        'weight'                =>'',
                        'ware_life'             =>'',
                        'storage_type'          =>'',
                        'allow_return'          =>'',
                        'weight_limit_ratio'    =>'',
                        'fresh_weight_lower_limit'=>'',
                        'pattern'                =>'',
                        'spec_type'              =>'',
                        'chine'                  =>'',
                ],
                'ware_sku_data'             =>[
                        'rf_id'    =>'',
                        'item_num'    =>'',
                        'sale_attributes'    =>[
                            'attr_code_key'     =>'',
                            'attr_code_value'   =>'',
                            'attr_value_key'    =>'',
                            'attr_value_value'  =>'',
                        ],

                ],
                'ware_key_word_data'        =>[
                    'key_words'=>'',
                ],
                'ware_ad_data'              =>[
                    'ad'=>'',
                ],
                'ware_introduce_data'       =>[
                    'production_area'=>'',
                    'specification'=>'',
                ],
                'store_id_list'             =>'',
                'ware_detail_picture_list'  =>[
                    'image_url'=>'',
                    'index'=>'',
                ],
                'ware_picture_list'         =>[
                    'image_url'=>'',
                    'index'=>'',
                ],
                'ware_sku_picture_list'     =>[
                    'image_url'  =>'' ,
                    'index'      =>'' ,
                    'rfId'       =>'' ,
                ],

            ],
            'user_id'   =>'',
            'vendor_id' =>'',
            'trace_id'  =>'',

        ];
        return $this->request('/dmall/online/ware/sync',$params);
    }

    /**
     * 根据部分条件分页查询商品信息
     * @param $data
     * @return mixed
     * @throws \shaoyv8\dmall\HttpException
     * @author: flynn
     * @Time: 2024/6/27
     * dmall.ware.page.query
     */
    public function dmall_ware_page_query ($data)
    {
        $params = [
            'matnr_list' =>'',
            'modified_start_time' =>'',
            'modified_end_time' =>'',
            'page_size'      =>'',
            'last_index_id'    =>'',
            'trace_id'       =>'',
        ];
        return $this->request('/dmall/ware/page/query',$params);
    }

    /** 
     * 根据部分条件分页查询门店商品详情
     * @param $data
     * @return mixed
     * @throws \shaoyv8\dmall\HttpException
     * @author: flynn
     * @Time: 2024/6/27
     * dmall.sap.ware.page.query
     */
    public function dmall_sap_ware_page_query ($data)
    {
        $params = [
            'shop_code'              =>'',
            'last_index_id'          =>'',
            'rf_ids'                 =>'',
            'sap_ware_status'        =>'',
            'modified_begin_time'    =>'',
            'modified_end_time'      =>'',
            'publish_status'         =>'',
            'trace_id'               =>'',
            'page_size'              =>'',
        ];
        return $this->request('/dmall/sap/ware/page/query',$params);
    }

    /** 
     * 根部部分条件分页查询商家品牌信息
     * @param $data
     * @return mixed
     * @throws \shaoyv8\dmall\HttpException
     * @author: flynn
     * @Time: 2024/6/27 
     * dmall.brand.page.query
     */
    public function dmall_brand_page_query ($data)
    {
        $params = [                     
            'vender_id'                 =>'',
            'vender_brand_code_list'    =>'',
            'current_page'              =>'',
            'page_size'                 =>'',
            'trace_id'                  =>'',
        ];
        return $this->request('/dmall/brand/page/query',$params);
    }

    /**  
     * 商品编码分页查询
     * @param $data
     * @return mixed
     * @throws \shaoyv8\dmall\HttpException
     * @author: flynn
     * @Time: 2024/6/27 
     * dmall.ware.rfId.page.query
     */
    public function dmall_ware_rfId_page_query ($data)
    {
        $params = [
            'pageSize'     =>'',
            'currentPage'  =>'',
        ];
        return $this->request('/dmall/ware/rfId/page/query',$params);
    }

    /** 
     * 根据条件分页查询商品信息
     * @param $data
     * @return mixed
     * @throws \shaoyv8\dmall\HttpException
     * @author: flynn
     * @Time: 2024/6/27
     * dmall.ware.whole.query
     */
    public function dmall_ware_whole_query ($data)
    {
        $params = [
            'matnr_list'           =>'',
            'modified_start_time'  =>'',
            'modified_end_time'    =>'',
            'page_size'            =>'',
            'last_index_id'        =>'',
            'trace_id'             =>'',
            'sku_id_list'          =>'',

        ];
        return $this->request('/dmall/ware/whole/query',$params);
    }

    /** 
     * 查询商品分类信息(包含小分类)
     * @param $data
     * @return mixed
     * @throws \shaoyv8\dmall\HttpException
     * @author: flynn
     * @Time: 2024/6/27
     * dmall.ware.combined.query
     */ 
    public function dmall_ware_combined_query ($data)
    {
        $params = [
            'type'       =>'',
            'shop_type'  =>'',
        ];
        return $this->request('/dmall/ware/combined/query',$params);
    }

}