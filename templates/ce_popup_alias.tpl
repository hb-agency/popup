<div class="<?php echo $this->class; ?>"<?php echo $this->cssID; ?>>
<?php if(!$this->linkImage) : echo $this->embed_pre; endif; ?>
<a rel="lightbox[inline <?php echo $this->windowWidth; ?> <?php echo $this->windowHeight; ?>]" href="#<?php echo $this->contentid; ?>" title="<?php echo $this->linkTitle; ?>">
<?php if($this->linkImage) : ?><img src="<?php echo $this->linkSrc; ?>" alt="<?php echo $this->linkAlt; ?>" border="0" /><?php else : echo $this->linkTitle; endif; ?>
</a>
<?php if(!$this->linkImage) : echo $this->embed_post; endif; ?>
</div>

<div class="invisible" id="<?php echo $this->contentid; ?>">
<?php echo $this->content; ?>
</div>