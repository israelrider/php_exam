<main>
	<hr/>

	<form class="forwarding-ref-form" id="cookie-issue-form">
		<div>
			<label for="email">
				Email:
			</label>
			<input type="text" id="email" name="email" value="dror799@gmail.com">
		</div>

		<div>
			<label for="password">
				Password:
			</label>
			<input type="text" id="password" name="password" value="1">
		</div>

		<input type="submit" value="Login">
	</form>

	<hr/>

	<form class="forwarding-ref-form" style="height: fit-content" id="refresh-tokens-request">
		<input type="submit" value="Refresh Tokens">
	</form>

	<hr/>

	<form class="forwarding-ref-form" style="height: fit-content" id="logout-request">
		<input type="submit" value="Logout">
	</form>

	<hr/>
</main>

<script>

  (function ($, window, document) {
    $(function () {

      const addUserForm = $('#cookie-issue-form');
      const refreshTokensRequest = $('#refresh-tokens-request');
      const logoutRequest = $('#logout-request');

      addUserForm.on('submit', function (event) {
        event.preventDefault();

        const data = $(this).serializeArray();

        $.ajax({
          type: 'post',
          url: 'http://localhost:3333/api/auth/login',
          xhrFields: {
            withCredentials: true
          },
          crossDomain: true,
          data,
          dataType: 'json',
          //  encode: true,
        })
      });

      refreshTokensRequest.on('submit', function (event) {
        event.preventDefault();

        $.ajax({
          type: 'post',
          url: 'http://localhost:3333/api/auth/refresh-tokens',
          xhrFields: {
            withCredentials: true
          },
          crossDomain: true,
          //data:null,
          //dataType: 'json',
          //  encode: true,
        })
      });

      logoutRequest.on('submit', function (event) {
        event.preventDefault();

        $.ajax({
          type: 'post',
          url: 'http://localhost:3333/api/auth/logout',
          xhrFields: {
            withCredentials: true
          },
          crossDomain: true,
          //data:null,
          //dataType: 'json',
          //  encode: true,
        })
      });

    });
  }(window.jQuery, window, document));

</script>
