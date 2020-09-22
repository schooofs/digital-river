<div class="abm-bar body-inner-wrapper navbar-fixed-top clearfix" style="bottom: 0px; top:auto; padding:5px 15px; border-top:solid 1px #eee;">
	<form class="form-inline pull-left">
		<div class="form-group">
			<label>Select Account To Preview:</label>
			<select class="form-control" style="width:300px;" name="account">
				<?php foreach(ABM::$accounts as $account): ?>
					<option value="<?= $account ?>" <?= (isset($_GET['account']) && $_GET['account'] === $account) ? 'selected="selected"':'' ?>><?= $account ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<input type="hidden" name="abm" value="1" />
		<input type="submit" value="Select" class="btn btn-primary" />
	</form>
	<div class="pull-right">
		<div class="btn btn-primary pull-right" onClick="jQuery('#accountInfoTable').toggleClass('hidden');">View Info</div>
		<table id="accountInfoTable" class="table table-striped hidden">
			<thead>
				<tr>
					<th>Key</td>
					<th>Value</td>
				</tr>
			</thead>
			<tbody>
			<?php foreach($account_info as $key => $value): ?>
				<tr>
					<td><?= $key ?></td>
					<td><?= $value ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
		</table>
	</div>
</div>
<?php if(!isset($_GET['account'])): ?>
<script>window.abm_info = <?= json_encode(["account_name" => ABM::$accounts[0]]); ?></script>
<?php endif; ?>