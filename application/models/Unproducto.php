<?php
class Unproducto extends CI_Model {

        public function __construct()
        {
                parent::__construct();
                $this->db = $this->load->database('default',true);
                $local = "1";
        }
//TODO falta agregar lista al comienso de todas las querys
//TODO modular las funciones

//LISTAR PRODUCTO ESPESIFICO 			pro_oferta,       pro_novedad,

        public function producto($p){
        	$result_set = $this->db->query(
	        	"select
    				pro_codprod,
    				pro_desc,
    				round(psl_saldo) as saldo,
        		round(((100-pre_maxdesctorecargo)/100)*pre_precio) as precio
						from
							sto_precios r ,
							sto_producto p ,
							sto_prodsal
						where
        		r.pre_codprod = p.pro_codprod and
        		p.pro_codprod = psl_codprod and
        		pro_codprod = '".$p."' and
            pre_rangoinicial = '1' and
            pro_vigencia = 'S' and
        		pre_codlista='1' and
        		psl_saldo != '0' and
        		psl_codbodega = '1' ");
			return $result_set->result_array();
        }

//LISTA RANGO DE PRECIO DE UN PRODUCTO EN ESPESIFICO
        public function rangos($cod){
          $result_set = $this->db->query(
            "select
              round(pre_rangoinicial) as ri,
              case when pre_rangofinal is null then 999999 else round(pre_rangofinal) end as rf,
              round(((100-pre_maxdesctorecargo)/100)*pre_precio) as precio
              from sto_precios,
                  sto_prodsal
            where
              pre_codprod = '".$cod."' and
              pro_vigencia = 'S' and
              psl_saldo != '0' and 
              pre_codlista ='1'
            order by ri");

          return $result_set -> result_array();
         }

        }