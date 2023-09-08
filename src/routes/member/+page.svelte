<script>
	let name = '';
	let email = '';
  
	async function handleSubmit() {
	  const response = await fetch('/appData', {
		method: 'POST',
		headers: {
		  'Content-Type': 'application/json',
		},
		body: JSON.stringify({ name, email }),
	  });
  
	  if (response.ok) {
		console.log('บันทึกข้อมูลสำเร็จ');
	  } else {
		console.error('มีข้อผิดพลาดในการบันทึกข้อมูล');
	  }
	}
  </script>
  
  <form on:submit={handleSubmit}>
	<label>
	  ชื่อ:
	  <input type="text" bind:value={name} />
	</label>
	<br />
	<label>
	  อีเมล:
	  <input type="email" bind:value={email} />
	</label>
	<br />
	<button type="submit">บันทึก</button>
  </form>



<!-- <script>
	let name = '';
	let email = '';
  
	async function handleSubmit() {
	  const response = await fetch('/addData', {
		method: 'POST',
		headers: {
		  'Content-Type': 'application/json',
		},
		body: JSON.stringify({ name, email }),
	  });
  
	  if (response.ok) {
		console.log('บันทึกข้อมูลสำเร็จ');
	  } else {
		console.error('มีข้อผิดพลาดในการบันทึกข้อมูล');
	  }
	}
  </script> -->

<!-- <form on:submit={handleSubmit}>
    <label for="name">First name:</label><br>
	<input type="text" id="name" name="name" bind:value={name} /><br> -->
	<!-- <label for="surname">Last name:</label><br>
	<input type="text" id="surname" name="surname"><br> -->
    <!-- <label for="email">Email:</label><br>
	<input type="text" id="email" name="email" bind:value={email}><br> -->
    <!-- <label for="password">password:</label><br>
	<input type="text" id="password" name="password"><br><br> -->
	<!-- <button type="submit" value="Submit">Submit</button>
</form> -->