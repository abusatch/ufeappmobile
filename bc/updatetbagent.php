<?php

require_once('db.php');


mysqli_query($koneksi,"update tb_agent set 
short_desc = 'Inscription et obtention de visa-kitas',
long_desc = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.
Lorem Ipsum has been the industry standard dummy text ever since the
1500s, when an unknown printer took a galley of type and scrambled it to
make a type specimen book.
It has survived not only five centuries, but also the leap into electronic
typesetting, remaining essentially unchanged. It was popularised in the
1960s with the release of Letraset sheets containing Lorem Ipsum passages,
and more recently with desktop publishing software like Aldus PageMaker
including versions of Lorem Ipsum',
namaagent = 'Company Name',
gmaps = 'https://www.google.co.id/maps/@-6.2894501,106.8060391,15z',
alamatagent = 'Address',
alamat2agent = 'Number address',
kotaagent = 'City',
kodeposagent = 'Post code',
telpagent = 'Phone number',
mobileagent = 'Mobile number',
emailagent = 'Email address',
webagent = 'Website',
fbagent = 'facebook.com',
twiteragent = 'twitter.com',
igagent = 'instagram.com',
playstoreagent = 'https://play.google.com/store/apps/details?id=com.night.blog'

");





echo mysqli_error($koneksi);

?>