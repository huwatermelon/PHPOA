<?php defined('HOST') or die('not access');?>
<script >
$(document).ready(function(){
	
	var a = $('#view_{rand}').bootstable({
		tablename:'chargems',url:js.getajaxurl('getqian','{mode}','{dir}'),statuschange:false,
		columns:[{
			text:'编号',dataIndex:'num'
		},{
			text:'签名',dataIndex:'cont'
		},{
			text:'是否公开',dataIndex:'isgk',type:'checkbox'
		},{
			text:'状态',dataIndex:'statustext'
		},{
			text:'来源',dataIndex:'fromstr'
		}],
		beforeload:function(){
			btn(true);
		},
		itemclick:function(d){
			var bo = (d.isedit==1)?false:true;
			btn(bo);
		}
	});
	
	function btn(bo){
		get('edit_{rand}').disabled = bo;
	}
	
	var c={
		reloads:function(){
			a.reload();
		},
		clickwin:function(o1,lx){
			var h = $.bootsform({
				title:'短信签名',height:400,width:400,
				tablename:'sms',isedit:lx,
				url:js.getajaxurl('saveqian','{mode}','{dir}'),
				submitfields:'cont,isgk,num',
				items:[{
					labelText:'签名名称',name:'cont',required:true,blankText:'3-8个字符'
				},{
					labelText:'',name:'num',type:'hidden'
				},{
					name:'isgk',labelBox:'公开(让其他用户也可以使用)',type:'checkbox',checked:false
				}],
				success:function(){
					js.msg('success','保存成功');
					a.reload();
				},
				submitcheck:function(d){
					var len=d.cont.length;
					if(len<3)return '签名必须3个字符以上';
					if(len>8)return '签名不能超过8个字符';
				}
			});
			if(lx==1){
				h.setValues(a.changedata);
			}
			h.getField('cont').focus();
		},
		reloadszt:function(){
			js.msg('wait','刷新中...');
			js.ajax(js.getajaxurl('reloadsign','{mode}','{dir}'),false, function(ret){
				if(ret.success){
					js.msg('success','刷新成功');
					a.reload();
				}else{
					js.msg('msg',ret.msg);
				}
			},'get,json');
		}
	};

	js.initbtn(c);
	
	
});
</script>
<div>
	<table width="100%"><tr>
	<td nowrap>
		<button class="btn btn-primary" click="clickwin,0"  type="button"><i class="icon-plus"></i> 新增</button>
		 &nbsp; 
		<button class="btn btn-default" click="reloads"  type="button"><i class="icon-refresh"></i> 刷新</button>
	</td>
	<td align="right">
	<button class="btn btn-default" click="reloadszt"  type="button"><i class="icon-refresh"></i> 刷新状态/获取签名</button>&nbsp;
		<button class="btn btn-info" id="edit_{rand}" click="clickwin,1" disabled type="button"><i class="icon-edit"></i> 编辑 </button>
	</td>
	</tr>
	</table>
</div>
<div class="blank10"></div>
<div id="view_{rand}"></div>
<div class="tishi">如公开说明使用快彩系统的用户都可以使用这个签名，审核通过签名不能修改。普通用户不能添加签名，VIP用户可添加1个签名，合作商没限制，添加签名是需要审核的，可[刷新状态]查看审核状态。</div>