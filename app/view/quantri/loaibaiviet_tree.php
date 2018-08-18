
<?php $cacloaibv = $this->qt->listloai_dequy(0);?> 

<ul id="tree">
    <?php foreach($cacloaibv as $loaibv) { ?>
	<li><a href="<?=$baseForTree.$loaibv['id']?>"><b><?= $loaibv['ten']?></b></a>
      <?php $listloaicon = $this->qt->listloai_dequy($loaibv['id']);?>
	<?php if (count($listloaicon)>0) { ?>
	<ul>
        <?php foreach($listloaicon as $motlc) {?> 
	  <li><a href="<?=$baseForTree.$motlc['id']?>"><?=$motlc['ten']?> </a></li>
        <?php }?>
	</ul>
      <?php }?>
	</li>
    <?php }?>
</ul>
<select name="" >
	<option value="">ádsad</option>}
	option
</select>