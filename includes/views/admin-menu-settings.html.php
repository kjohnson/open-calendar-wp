<div class="wrap">

    <h2>Open Calendar - Settings</h2>

    <?php foreach( $settings as $setting ): ?>

        <p>
        <?php if( 'textbox' == $setting[ 'type' ] ): ?>

            <label><?php echo $setting[ 'label' ]; ?>
                <input type="text" class="widefat" value="<?php echo $setting[ 'value' ]; ?>">
            </label>

        <?php endif; ?>

        <?php if( 'textarea' == $setting[ 'type' ] ): ?>

            <label><?php echo $setting[ 'label' ]; ?>
                <textarea class="widefat" name="" id="" cols="30" rows="10"><?php echo $setting[ 'value' ]; ?></textarea>
            </label>

        <?php endif; ?>

        <?php if( 'checkbox' == $setting[ 'type' ] ): ?>

            <label>
                <input type="checkbox"<?php if( $setting[ 'value' ] ) echo " checked"; ?>><?php echo $setting[ 'label' ]; ?>
            </label>

        <?php endif; ?>
        </p>

    <?php endforeach; ?>

    <input type="submit" class="button button-primary" value="Save">

</div>