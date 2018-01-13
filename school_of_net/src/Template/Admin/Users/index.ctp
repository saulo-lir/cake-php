<table>
	<thead>
		<tr>
			<th>id</th>
			<th>name</th>
			<th>username</th>
			<th>email</th>
			<th>action</th>
		</tr>
	</thead>

	<tbody>
		<?php foreach($users as $user){ ?>
		<tr>
			<td><?= $user->id ?></td>
			<td><?= $user->name ?></td>
			<td><?= $user->username ?></td>
			<td><?= $user->email ?></td>			
			<td>
				<a href='http://localhost/curso-cakePHP/school_of_net/admin/users/view/<?= $user->id ?>'>view</a>
				<a href='http://localhost/curso-cakePHP/school_of_net/admin/users/edit/<?= $user->id ?>'>edit</a>
				<form action='http://localhost/curso-cakePHP/school_of_net/admin/users/delete/<?= $user->id ?>' method='post'>
					<input type='submit' value='delete'>
				</form>
			</td>
		</tr>
		<?php 
			} 
		?>		
	</tbody>
</table>

<a href='http://localhost/curso-cakePHP/school_of_net/admin/users/add/'>new</a>