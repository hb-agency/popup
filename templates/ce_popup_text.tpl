<div class="<?php echo $this->class; ?>"<?php echo $this->cssID; ?>>
<?php if(!$this->linkImage) : echo $this->embed_pre; endif; ?>
<a rel="lightbox[inline <?php echo $this->windowWidth; ?> <?php echo $this->windowHeight; ?>]" href="#<?php echo $this->contentid; ?>" title="<?php echo $this->linkTitle; ?>">
<?php if($this->linkImage) : ?><img src="<?php echo $this->linkSrc; ?>" alt="<?php echo $this->linkAlt; ?>" border="0" /><?php else : echo $this->linkTitle; endif; ?>
</a>
<?php if(!$this->linkImage) : echo $this->embed_post; endif; ?>
</div>

<div class="invisible" id="<?php echo $this->contentid; ?>">
<?php if (!$this->addBefore): ?>

<?php echo $this->text; ?>
<?php endif; ?>
<?php if ($this->addImage): ?>

<div class="image_container<?php echo $this->floatClass; ?>"<?php if ($this->margin || $this->float): ?> style="<?php echo trim($this->margin . $this->float); ?>"<?php endif; ?>>
<?php if ($this->href): ?>
<a href="<?php echo $this->href; ?>"<?php echo $this->attributes; ?> title="<?php echo $this->alt; ?>">
<?php endif; ?>
<img src="<?php echo $this->src; ?>"<?php echo $this->imgSize; ?> alt="<?php echo $this->alt; ?>" />
<?php if ($this->href): ?>
</a>
<?php endif; ?>
<?php if ($this->caption): ?>
<div class="caption"><?php echo $this->caption; ?></div>
<?php endif; ?>
</div>
<?php endif; ?>
<?php if ($this->addBefore): ?>

<?php echo $this->text; ?>
<?php endif; ?>

</div>