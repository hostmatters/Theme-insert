	<style>
	.card
	{
		min-width: 255px;
		max-width: 620px;
	}
	</style>

	  <form method="post" class="card">
	    <?php settings_fields( 'footerfields-settings' ); ?>
	    <?php do_settings_sections( 'footerfields-settings' ); ?>
	    	  <h1>Theme Insert</h1>
			  <hr />
	    <table class="form-table">
	      <tr valign="top">
	      <th scope="row">Header scripts:</th>
	      <td>
	      <textarea name="headerfields" rows="12" class="regular-text"><?php echo esc_html( wp_unslash(get_option( 'headerfields' ))); ?></textarea>
	      <p>These scripts will be printed in the <?= htmlspecialchars('<head> and </head>') ?> tag!</p>
	      </td>
	      </tr>

		  <tr>
	      <th scope="row">Footer scripts:</th>
	      <td>
	      <textarea name="footerfields" rows="12" class="regular-text"><?php echo esc_html( wp_unslash(get_option( 'footerfields' ))); ?></textarea>
	      <p>These scripts will be printed right before the <?= htmlspecialchars('</body>') ?> tag!</p>
	      </td>
	      <tr>
		      <td></td>
		      <td><strong>Dont use <?= htmlspecialchars('comment tags ie. <!-- and -->') ?>!</strong></td>
	      </tr>
	      
	      <tr>
		      <td></td>
		      <td align="right"><?php submit_button(); ?></td>
	      </tr>
	    </table>
	    
	  </form>
	  