<?php
/*
 * Plugin Name: RtdSocial Widget
 * Plugin URI: http://rootdesignwp.com
 * Description: A little widget to add your social profiles.
 * Author: rootdesign
 * Version: 1.0
 * Author URI: http://rootdesignwp.com
 * License: GPL2+
 */
 
 
defined ('ABSPATH') or die("Direct Access is not allowed"); 

class RootSocial_profile_Widget extends WP_Widget {
 
public function __construct() {
 
    parent::__construct(
        'social_profiles_widget', // Base ID
        'RTDSocial Widget', // Name
        array( 'description' => __( 'A simple Social Profiles Widget Widget', 'text_domain' ), ) // Args
    );
}
 
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'text_domain' );
		}
		
		$facebook = isset($instance['facebook'])?$instance['facebook']:'';

        $twitter = isset($instance['twitter'])?$instance['twitter']:'';

        $linkedin = isset($instance['linkedin'])?$instance['linkedin']:'';

        $youtube = isset($instance['youtube'])?$instance['youtube']:'';

        $googleplus = isset($instance['googleplus'])?$instance['googleplus']:'';
        $github = isset($instance['github'])?$instance['github']:'';


	
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e( 'Facebook:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" type="text" value="<?php echo esc_attr( $facebook ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e( 'Twitter:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" type="text" value="<?php echo esc_attr( $twitter ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php _e( 'Linkedin:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" type="text" value="<?php echo esc_attr( $linkedin ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'youtube' ); ?>"><?php _e( 'Youtube:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" type="text" value="<?php echo esc_attr( $youtube ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'googleplus' ); ?>"><?php _e( 'Googleplus:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'googleplus' ); ?>" name="<?php echo $this->get_field_name( 'googleplus' ); ?>" type="text" value="<?php echo esc_attr( $googleplus ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'github' ); ?>"><?php _e( 'Github:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'github' ); ?>" name="<?php echo $this->get_field_name( 'github' ); ?>" type="text" value="<?php echo esc_attr( $github ); ?>" />
		</p>
		<?php
	}
	
	
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        echo $args['before_widget'];
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];

        if($instance['facebook']) {
    		echo '<a class="social-icon" target="_blank" href="' . $instance['facebook'] . '"><i class="fa fa-facebook"></i></a>';
		}
        if($instance['twitter']) {
    		echo '<a class="social-icon" target="_blank" href="' . $instance['twitter'] . '"><i class="fa fa-twitter"></i></a>';
		}
        if($instance['linkedin']) {
    		echo '<a class="social-icon" target="_blank" href="' . $instance['linkedin'] . '"><i class="fa fa-linkedin"></i></a>';
		}
        if($instance['github']) {
    		echo '<a class="social-icon" target="_blank" href="' . $instance['github'] . '"><i class="fa fa-github"></i></a>';
		}
        if($instance['googleplus']) {
    		echo '<a class="social-icon" target="_blank" href="' . $instance['googleplus'] . '"><i class="fa fa-google-plus"></i></a>';
		}
        if($instance['youtube']) {
    		echo '<a class="social-icon" target="_blank" href="' . $instance['youtube'] . '"><i class="fa fa-youtube"></i></a>';
		}

        echo $args['after_widget'];
    }
 
 
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['facebook'] = esc_url( $new_instance['facebook'] );
        $instance['twitter'] = esc_url( $new_instance['twitter'] );
        $instance['linkedin'] = esc_url( $new_instance['linkedin'] );
        $instance['youtube'] = esc_url( $new_instance['youtube'] );
        $instance['googleplus'] = esc_url( $new_instance['googleplus'] );
        $instance['github'] = esc_url( $new_instance['github'] );
		
		return $instance;
	}
 
 
} // class Social_Widget
 
function init_Social_profile_Widget(){
    register_widget("RootSocial_profile_Widget");
}
add_action("widgets_init","init_Social_profile_Widget");


function root_enqueue_styles() {

    wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );
      wp_enqueue_style( 'style-css', plugins_url('rtdsocial-widget/css/style.css' ));

}
add_action( 'wp_enqueue_scripts', 'root_enqueue_styles' );