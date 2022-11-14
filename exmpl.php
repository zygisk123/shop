
<input <?=(isset($_GET[$brand->id]))?($_GET[$$brand->id] == $brand->name) ? "checked" : '':'';?> value="<?= $brand->name?>" class="form-check-input" type="checkbox" name="<?= $$brand->id?>" id="<?= $$brand->id?>">
            <?php echo $brand->name.'<br>';?>