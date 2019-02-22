<form role="form">
    <input id="mobile_id" name="mobile_id" type="hidden" value="<?= $mobile->ID; ?>"/>

    <input type="text" id="mobile_description" name="mobile_description"
           class="form-control" placeholder="Сколько служит батарея"
           value="<?= $mobile_description ?>"/>
</form>