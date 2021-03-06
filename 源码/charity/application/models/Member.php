<?php

/**
 * 用户管理
 *
 * @author: lindexin
 * @since : 2016/06/27 10:36
 */

class MemberModel extends BaseModel {

    const AUTH_KEY = 'M@x^@!e@($';

    public function __construct()
    {
        parent::__construct('charity', 't_member', 'm_id');
    }

    /**
     * 获取列表
     *
     * @param array $where
     * @param array $pagination
     * @return bool
     */
    public function getList($where=array(), $pagination=array()) {
        $data = $this->_setWhereSQL($where)
                    ->_setPaginationSQL($pagination)
                    ->_db->select('*')
                    ->from($this->_table)
                    ->order($this->_primary_key, 'DESC')
                    ->fetchAll();

        if ( $data === FALSE ) return FALSE;
        return $data;
    }

    /**
     * 统计数量
     *
     * @param array $where
     */
    public function countData($where=array()) {
        return $this->_setWhereSQL($where)->_db->select('COUNT(*)')->from($this->_table)->fetchValue();
    }


    /**
     * @param $id
     */
    public function getInfo($id) {
        return $this->_db->select('*')->from($this->_table)->where($this->_primary_key, $id)->fetchOne();
    }

    /**
     * 改变状态
     *
     * @param $id
     * @param array $data 修改数据
     * @return mixed
     */
    public function changeData($id, $data) {
        return $this->_db->update($this->_table)->rows($data)->where($this->_primary_key, $id)->execute();
    }

    /**
     * SQL分页查询
     */
    private function _setPaginationSQL( $pagination = array() ) {
        if ( isset($pagination['page']) AND isset($pagination['pagesize']) ) {
            $page      = isset( $pagination['page'] ) ? intval($pagination['page']) : 1;
            $pagesize  = isset( $pagination['pagesize']  ) ? intval($pagination['pagesize'])  : 10;
            $this->_db->page($page, $pagesize);
        } elseif ( isset($pagination['limit']) ) {
            $this->_db->limit( intval($pagination['limit']) );
        }
        return $this;
    }

    /**
     * SQL Where条件
     * @param array $where
     * @return $this
     */
    private function _setWhereSQL ($where = array()) {
        if (isset($where['id']) AND $where['id']) {
            $this->_db->where("m_id", $where['id']);
        }

        if (isset($where['username']) AND $where['username']) {
            $this->_db->where("m_name like '%{$where['username']}%'");
        }

        return $this;
    }

    /**
     * 整合信息
     *
     * @param $data
     * @return mixed
     */
    public function mergData($data,$key='m_id') {
        if ( ! is_array( $data ) )
            return $data;

        $ids = Helper_Array::setIds($data, $key, TRUE);
        if ( ! $ids) {return $data;}

        //订单信息
        $info = $this->_db->select('m_id', 'm_name')->from($this->_table)->where("m_id IN({$ids})")->fetchAll();
        if ( $info === FALSE ) {return $data;}

        $info = Helper_Array::setIdsKey($info, 'm_id');

        foreach ( $data AS &$row ) {
            $row['m_id']   = isset($info[ $row[$key] ]) ? $info[ $row[$key] ]['m_id'] : '';
            $row['m_name']   = isset($info[ $row[$key] ]) ? $info[ $row[$key] ]['m_name'] : '';
        }
        return $data;
    }

}