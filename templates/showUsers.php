<main>
	<table>
		<tr>
			<th>Username</th>
			<th>Email</th>
			<th></th>
		</tr>
		<?php
		foreach ($data as $rowData) {
			?>
			<tr data-id="<?php echo $rowData['id'] ?>">
				<td class="username-cell">
					<?php echo $rowData['username'] ?>
				</td>
				<td>
					<?php echo $rowData['email'] ?>
				</td>
				<td>
					<a class="active delete-user" href="#">
						Delete
					</a>
				</td>
			</tr>
			<?php
		}
		?>
	</table>

	<div class="ajax-loader"></div>
	<div class="user-details">
		<span>x</span>
	</div>
</main>
