<?php
function asata_fw_ext_backups_demos($demos) {
    $demos_array = array(
		'asata' => array(
			'title' => esc_html__('Asata', 'asata'),
			'screenshot' => 'http://beplusthemes.com/install/demo/asata/asata/screenshot.jpg',
			'preview_link' => 'http://asata.beplusthemes.com/',
		),
		
    );

    $download_url = 'http://beplusthemes.com/install/demo/asata/';

    foreach ($demos_array as $id => $data) {
        $demo = new FW_Ext_Backups_Demo($id, 'piecemeal', array(
            'url' => $download_url,
            'file_id' => $id,
        ));
        $demo->set_title($data['title']);
        $demo->set_screenshot($data['screenshot']);
        $demo->set_preview_link($data['preview_link']);

        $demos[ $demo->get_id() ] = $demo;

        unset($demo);
    }

    return $demos;
}
add_filter('fw:ext:backups-demo:demos', 'asata_fw_ext_backups_demos');
