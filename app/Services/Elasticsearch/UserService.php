<?php
namespace App\Services\Elasticsearch;

use Elasticsearch\ClientBuilder;

class UserService
{
    public $es = null;
    public $index = "shop_db";
    public $type = "user";
    public function __construct()
    {
        $this->es = ClientBuilder::create()->setHosts(['192.168.10.118:9200'])->build();
    }

    /**
     * 创建数据库(index=DB)
     * 创建一个索引 Index （非关系型数据库里面那个索引，而是关系型数据里面的数据库的意思）
     * @return void
     */
    public function createIndex() {
        $this->delIndex();
        $params = [
            'index' => $this->index,
            'body' => [
                'settings' => [
                    'number_of_shards' => 2,
                    'number_of_replicas' => 0
                ]
            ]
        ];
        $this->es->indices()->create($params);
    }
    /**
     * 删除数据库(index=DB)
     * 删除一个Index
     * @return void
     */
    public function delIndex() {
        $params = [
            'index' => $this->index
        ];
        if ($this->checkIndexExists()) {
            $this->es->indices()->delete($params);
        }
    }

    /**
     * 检查数据库(index=DB)
     * 检查Index 是否存在
     * @return bool
     */
    public function checkIndexExists() {
        $params = [
            'index' => $this->index
        ];
        return $this->es->indices()->exists($params);
    }


    /**
     * 创建表
     * 创建文档模板
     * @return void
     */
    public function createMapping() {
        $this->createIndex();
        $params = [
            'index' => $this->index,
            'type' => $this->type,
            'include_type_name'=>true,
            'body' => [
                    '_source' => [
                        'enabled' => true
                    ],
                    'properties' => [
                        'id' => [
                            'type' => 'integer'
                        ],
                        'first_name' => [
                            'type' => 'text',
                            'analyzer' => 'ik_max_word'
                        ],
                        'last_name' => [
                            'type' => 'text',
                            'analyzer' => 'ik_max_word'
                        ],
                        'age' => [
                            'type' => 'integer'
                        ]
                    ]
            ]
        ];
        $this->es->indices()->putMapping($params);
    }

    /**
     * 添加记录insert
     * 添加一个文档到 Index 的Type中
     * @param array $body
     * @return void
     */
    public function putDoc($body = []) {
        $params = [
            'index' => $this->index,
            'type' => $this->type,
//            'id' => 1, #表的主键ID，可以手动指定id，也可以不指定随机生成
            'body' => $body
        ];
        $this->es->index($params);
    }
    /**
     * 删除一个文档
     * @param $id
     * @return array
     */
    public function delDoc($id) {
        $params = [
            'index' => $this->index,
            'type' => $this->type,
            'id' =>$id
        ];
        return $this->es->delete($params);
    }

    /**
     * 更新记录 update
     * 更新一个文档
     * @param $id
     * @return array
     */
    public function updateDoc($id) {
        $params = [
            'index' => $this->index,
            'type' => $this->type,
            'id' =>$id,
            'body' => [
                'doc' => [
                    'first_name' => '张',
                    'last_name' => '三',
                    'age' => 99
                ]
            ]
        ];
        return $this->es->update($params);
    }
    /**
     * 搜索文档，query是查询条件
     * @param array $query
     * @param int $from
     * @param int $size
     * @return array
     */
    public function search($query = [], $from = 0, $size = 5) {
//        $query = [
//            'query' => [
//                'bool' => [
//                    'must' => [
//                        'match' => [
//                            'first_name' => 'Cronin',
//                        ]
//                    ],
//                    'filter' => [
//                        'range' => [
//                            'age' => ['gt' => 76]
//                        ]
//                    ]
//                ]
//
//            ]
//        ];
        $params = [
            'index' => $this->index,
//            'index' => 'm*', #index 和 type 是可以模糊匹配的，甚至这两个参数都是可选的
            'type' => $this->type,
            '_source' => ['first_name','age'], // 请求指定的字段
            'body' => array_merge([
                'from' => $from,
                'size' => $size
            ],$query)
        ];
        return $this->es->search($params);
    }

    /**
     * 搜索文档，query是查询条件
     * @param array $query
     * @param int $from
     * @param int $size
     * @return array
     */
    public function analyzer($query = [], $from = 0, $size = 5) {
//        $query = [
//            'query' => [
//                'bool' => [
//                    'must' => [
//                        'match' => [
//                            'first_name' => 'Cronin',
//                        ]
//                    ],
//                    'filter' => [
//                        'range' => [
//                            'age' => ['gt' => 76]
//                        ]
//                    ]
//                ]
//
//            ]
//        ];
        $params = [
            'index' => $this->index,
//            'index' => 'm*', #index 和 type 是可以模糊匹配的，甚至这两个参数都是可选的
            'type' => $this->type,
            'analyzer'=>'ik_max_word', //字段
            '_source' => ['first_name','age'], // 请求指定的字段
            'body' => array_merge([
                'from' => $from,
                'size' => $size
            ],$query)
        ];
        return $this->es->search($params);
    }
}