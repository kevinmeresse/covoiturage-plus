<?php
/*
 * This is a simple short-hand wrapper for Doctrine_Query. It provides
 * a shorter class name and a few additional functions.
 */
class DQ extends Doctrine_Query {
    /**
     * Returns a DQ object to get started
     *
     * @return DQ
     */
    public static function create($conn = null, $class = null) {
            return new DQ($conn);
    }

    /**
     * This function will wrap the current dql where statement
     * in parenthesis. This allows more complex dql statements
     * It can be called multiple times during the creation of the dql
     * where clause.
     *
     * @return $this
     */
    public function whereParenWrap() {
            $where = $this->_dqlParts['where'];
            if (count($where) > 0) {
                    array_unshift($where, '(');
                    array_push($where, ')');
                    $this->_dqlParts['where'] = $where;
            }

            return $this;
    }
    
    /**
     * Overriding the andWhere function so that it will wrap the current dql where statement
     * in parenthesis. This allows more complex dql statements
     * 
     * @return $this
     */
    public function andWhere($where, $params = array()) {
        parent::andWhere($where, $params);
        $where = $this->_dqlParts['where'];
        array_splice($where, count($where)-1, 0, '(');
        array_push($where, ')');
        $this->_dqlParts['where'] = $where;
        
        return $this;
    }
    
    /**
     * Overriding the orWhere function so that it will wrap the current dql where statement
     * in parenthesis. This allows more complex dql statements
     * 
     * @return $this
     */
    public function orWhere($where, $params = array()) {
        parent::orWhere($where, $params);
        $where = $this->_dqlParts['where'];
        array_splice($where, count($where)-1, 0, '(');
        array_push($where, ')');
        $this->_dqlParts['where'] = $where;
        
        return $this;
    }

    /**
     * Create and andWhere if the where parameter is not empty
     *
     * @param string $where where string
     * @param parameters $params
     *
     * @return DQ this object
     */
    public function andWhereIf($where, $params = array()) {
            return empty($where)
                    ? $this
                    : $this->andWhere($where, $params);
    }

    /**
     * Create and orWhere if the where parameter is not empty
     *
     * @param string $where where string
     * @param parameters $params
     *
     * @return DQ this object
     */
    public function orWhereIf($where, $params = array()) {
            return empty($where)
                    ? $this
                    : $this->orWhere($where, $params);
    }
}

?>
