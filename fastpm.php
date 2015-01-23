<?php
/***************************************************************
*
*  (c) 2015 Chi Hoang (info@chihoang.de)
*  All rights reserved
*  
***************************************************************/
namespace Fastpm;

define ( "EMPTY_NODE", "0" );	
define ( "START_CHAR_COUNT","0" );

class Ternarytrie {
	
	var $head;
	var $result;
	
	function insert ( &$n, $payload, $pos, $is_leaf=false )
	{
		if ( ! is_object ( $n ) )
		{
			$n = new Node ( $payload->payload [ $pos ] );
		}                                                                                        
		
		if ( ord ( $payload->payload [ $pos ] ) < ord ( $n->char )  )
		{
			$this->insert ( $n->left, $payload,  $pos, $is_leaf );	
		
		} else if ( ord ( $payload->payload [ $pos ] ) > ord ( $n->char ))
		{
			$this->insert ( $n->right, $payload, $pos, $is_leaf );
			
		}  else {
		
			if ( $pos+1 == strlen ( $payload->payload ) )
			{
             
				$n->word = $payload;
                
                if ($is_leaf == false) 
				{
                    $n->is_leaf = false;
                }
                
			} else {
				
				$this->insert ( $n->mid, $payload, $pos+1, $is_leaf );
		
			}
		}	
	}

	//////////////////////////////////////////////////////////////////////////
	function search ( &$n, $key, $pos )
	{
		if ( !is_object ( $n ) ) 
			return EMPTY_NODE;

		if ( ord ( $key[ $pos ] ) < ord ( $n->char ) )
		{
			$this->search ( $n->left, $key, $pos );
		}
		else if ( ord ( $key [ $pos ] ) > ord ( $n->char ) )
		{
			$this->search ( $n->right, $key, $pos );
		}
	        else
		{
			if ( $pos+1 == strlen ( $key ) && $n->is_leaf==false)
			{   
			    $this->result[] = $n->word->get();  

			} else if ($n->is_leaf==false)
			{    
                $this->search ( $n->mid, $key, $pos+1 );
                $this->result[] = $n->word->get();
                
            } else {
            	
			    $this->search ( $n->mid, $key, $pos+1 );
			}
		}
	}
}

class Payload
{
	var $payload;
	
	public function __construct ( $string )
	{
		$this->payload = $string;
	}
	
	public function get ()
	{
		return $this->payload;
	}
};

///////////////////////////////////////////////////////////////////////////////////////////
class Node 
{
	var $is_leaf;
	var $left, $mid, $right;
	var $word, $char;
			
	public function __construct ( $char=null )
	{ 
		if  ( $char == null )
		{
			$this->left = EMPTY_NODE; 
			$this->right = EMPTY_NODE;
			$this->mid = EMPTY_NODE;
			$this->is_leaf = false;
			$this->word = $this->char = "";

		} else
		{
			$this->char = $char; 
			$this->is_leaf = true; 
		}
	}
	
	public function __unset ( $name )
	{
		echo "$name";
	}
}

class Fastpm extends Ternarytrie
{
	
	public function add ( $key )
	{
		$this->insert ( $this->head, new Payload ( $key ), START_CHAR_COUNT );
        
        for ($i=(strlen($key))-1;$i>=0;$i--)
		{
            $this->insert($this->head, new Payload(substr($key,$i,strlen($key))), 0, 1);
        }
	}

	public function match ( $key )
	{
        for ($i=0;$i<strlen($key);$i++)
		{
			$result = $this->search ( $this->head, substr($key,$i,strlen($key)) , START_CHAR_COUNT );
		}
		return implode(",",$this->result);
	}	
}
?>