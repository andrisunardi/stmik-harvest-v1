<?php

return [

    'success' => 'Terlihat Baik',

    'accepted' => 'The :attribute harus diterima.',
    'accepted_if' => 'The :attribute harus diterima ketika :other adalah :value.',
    'active_url' => 'The :attribute bukan URL yang valid.',
    'after' => 'The :attribute harus berupa tanggal setelah :date.',
    'after_or_equal' => ' :attribute harus tanggal setelah atau sama dengan :date.',
    'alpha' => 'The :attribute hanya boleh berisi huruf.',
    'alpha_dash' => ' :attribute hanya boleh berisi huruf, angka, tanda hubung, dan garis bawah.',
    'alpha_num' => 'The :attribute hanya boleh berisi huruf dan angka.',
    'array' => 'The :attribute harus berupa array.',
    'before' => 'The :attribute harus tanggal sebelum :date.',
    'before_or_equal' => 'The :attribute harus tanggal sebelum atau sama dengan :date.',
    'between' => [
        'array' => 'The :attribute harus memiliki antara :min dan :max item.',
        'file' => 'The :attribute harus antara :min dan :max kilobytes.',
        'numeric' => 'The :attribute harus antara :min dan :max.',
        'string' => 'The :attribute harus antara :min dan :max karakter.',
    ],
    'boolean' => 'Bidang :attribute harus benar atau salah.',
    'confirmed' => 'Konfirmasi :attribute tidak cocok.',
    'current_password' => 'Kata sandi salah.',
    'date' => 'The :attribute bukan tanggal yang valid.',
    'date_equals' => ' :attribute harus berupa tanggal yang sama dengan :date.',
    'date_format' => 'The :attribute tidak sesuai dengan format :format.',
    'declined' => 'The :attribute harus ditolak.',
    'declined_if' => ' :attribute harus ditolak jika :other adalah :value.',
    'different' => ' :attribute dan :other harus berbeda.',
    'digits' => 'The :attribute harus :digits digits.',
    'digits_between' => ' :attribute harus antara :min dan :max digit.',
    'dimensions' => 'The :attribute memiliki dimensi gambar yang tidak valid.',
    'distinct' => 'Bidang :attribute memiliki nilai duplikat.',
    'email' => 'The :attribute harus berupa alamat email yang valid.',
    'ends_with' => 'The :attribute harus diakhiri dengan salah satu dari berikut ini: :values.',
    'enum' => 'Yang dipilih :attribute tidak valid.',
    'exists' => 'Yang dipilih :atribut tidak valid.',
    'file' => 'The :attribute harus berupa file.',
    'filled' => 'Bidang :attribute harus memiliki nilai.',
    'gt' => [
        'array' => 'The :attribute harus memiliki lebih dari :value item.',
        'file' => 'The :attribute harus lebih besar dari :value kilobytes.',
        'numeric' => 'The :attribute harus lebih besar dari :value.',
        'string' => 'The :attribute harus lebih besar dari :value karakter.',
    ],
    'gte' => [
        'array' => 'The :attribute harus memiliki :value item atau lebih.',
        'file' => 'The :attribute harus lebih besar dari atau sama dengan :value kilobytes.',
        'numeric' => 'The :attribute harus lebih besar dari atau sama dengan :value.',
        'string' => 'The :attribute harus lebih besar dari atau sama dengan :value karakter.',
    ],
    'image' => 'The :attribute harus berupa gambar.',
    'in' => 'Yang dipilih :attribute tidak valid.',
    'in_array' => 'Bidang :attribute tidak ada di :other.',
    'integer' => 'The :attribute harus bilangan bulat.',
    'ip' => 'The :attribute harus berupa alamat IP yang valid.',
    'ipv4' => 'The :attribute harus berupa alamat IPv4 yang valid.',
    'ipv6' => 'The :attribute harus berupa alamat IPv6 yang valid.',
    'json' => ' :attribute harus berupa string JSON yang valid.',
    'lt' => [
        'array' => 'The :attribute harus memiliki kurang dari :value item.',
        'file' => 'The :attribute harus kurang dari :value kilobytes.',
        'numeric' => 'The :attribute harus lebih kecil dari :value.',
        'string' => 'The :attribute harus lebih kecil dari :value karakter.',
    ],
    'lte' => [
        'array' => 'The :attribute tidak boleh lebih dari :value item.',
        'file' => 'The :attribute harus kurang dari atau sama dengan :value kilobytes.',
        'numeric' => 'The :attribute harus lebih kecil atau sama dengan :value.',
        'string' => 'The :attribute harus kurang dari atau sama dengan :value karakter.',
    ],
    'mac_address' => ' :attribute harus berupa alamat MAC yang valid.',
    'max' => [
        'array' => 'The :attribute tidak boleh lebih dari :max item.',
        'file' => 'The :attribute tidak boleh lebih besar dari :max kilobytes.',
        'numeric' => 'The :attribute tidak boleh lebih besar dari :max.',
        'string' => 'The :attribute tidak boleh lebih besar dari :max karakter.',
    ],
    'mimes' => 'The :attribute harus berupa file dengan tipe: :values.', 'mimetypes' => 'The :attribute harus berupa file dengan tipe: :values.',
    'min' => [
        'array' => 'The :attribute harus memiliki minimal :min item.',
        'file' => 'The :attribute harus minimal :min kilobyte.',
        'numeric' => 'The :attribute harus minimal :min.',
        'string' => 'The :attribute harus minimal :min karakter.',
    ],
    'multiple_of' => ' :attribute harus kelipatan dari :value.',
    'not_in' => 'Atribut yang dipilih tidak valid.',
    'not_regex' => 'Format :attribute tidak valid.',
    'numeric' => 'The :attribute harus berupa angka.',
    'password' => [
        'letters' => 'The :attribute harus mengandung setidaknya satu huruf.',
        'mixed' => 'The :attribute harus mengandung setidaknya satu huruf besar dan satu huruf kecil.',
        'numbers' => 'The :attribute harus mengandung setidaknya satu nomor.',
        'symbols' => 'The :attribute harus mengandung setidaknya satu simbol.',
        'uncompromised' => 'Yang diberikan :attribute telah muncul dalam kebocoran data. Silakan pilih :attribute.',
    ],
    'present' => 'Bidang :attribute harus ada.',
    'prohibited' => 'Bidang :attribute dilarang.',
    'prohibited_if' => 'Bidang :attribute dilarang jika :other adalah :value.',
    'prohibited_unless' => 'Bidang :attribute dilarang kecuali :other ada di :values.',
    'prohibits' => 'Bidang :attribute melarang :other hadir.',
    'regex' => 'Format :attribute tidak valid.',
    'required' => 'Bidang :attribute wajib diisi.',
    'required_array_keys' => 'Bidang :attribute harus berisi entri untuk: :nilai.',
    'required_if' => 'Bidang :attribute diperlukan ketika :other adalah :value.',
    'required_unless' => 'Bidang :attribute wajib diisi kecuali :other ada di :values.',
    'required_with' => 'Bidang :attribute diperlukan bila :nilai ada.',
    'required_with_all' => 'Bidang :attribute diperlukan bila :nilai ada.',
    'required_without' => 'Bidang :attribute diperlukan bila :nilai tidak ada.',
    'required_without_all' => 'Bidang :attribute diperlukan bila tidak ada :nilai yang ada.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'array' => 'The :attribute harus berisi :size item.',
        'file' => 'The :attribute harus :size kilobytes.',
        'numeric' => 'The :attribute harus :size.',
        'string' => 'The :attribute harus :size karakter.',
    ],
    'starts_with' => ' :attribute harus dimulai dengan salah satu dari berikut ini: :values.',
    'string' => 'The :attribute harus berupa string.',
    'timezone' => ' :attribute harus berupa zona waktu yang valid.',
    'unique' => 'The :attribute telah diambil.',
    'uploaded' => 'The :attribute gagal diunggah.',
    'url' => 'The :attribute harus berupa URL yang valid.',
    'uuid' => 'The :attribute harus berupa UUID yang valid.',

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    'attributes' => [
        'per_page' => 'Per Page',
        'order_by' => 'Order By',
        'sort_by' => 'Sort By',
        'start_created_at' => 'Start Created At',
        'end_created_at' => 'End Created At',
        'start_updated_at' => 'Start Updated At',
        'end_updated_at' => 'End Updated At',
        'start_deleted_at' => 'Start Deleted At',
        'end_deleted_at' => 'End Deleted At',

        'current_password' => 'Current Password',
        'new_password' => 'New Password',
        'confirm_password' => 'Confirm Password',

        'confirm_reset' => 'Confirm Reset',

        'preview_image' => 'Preview Image',
        'preview_file' => 'Preview File',
        'preview_pdf' => 'Preview PDF',
        'preview_video' => 'Preview Video',
        'preview_website' => 'Preview Website',

        'line' => 'Line',
        'bbm' => 'BBM',
        'google' => 'Google',

        'abstract' => 'Abstract',
        'access' => 'Access',
        'active' => 'Active',
        'activity' => 'Activity',
        'add' => 'Add',
        'address' => 'Address',
        'admin' => 'Admin',
        'button_link' => 'Button Link',
        'button_name_id' => 'Button Name ID',
        'button_name' => 'Button Name',
        'call' => 'Call',
        'category' => 'Category',
        'city' => 'City',
        'code' => 'Code',
        'company' => 'Company',
        'corporate_author' => 'Corporate Author',
        'course' => 'Course',
        'created_at' => 'Created At',
        'created_by' => 'Created By',
        'date' => 'Date',
        'degree' => 'Degree',
        'delete' => 'Delete',
        'deleted_at' => 'Deleted At',
        'deleted_by' => 'Deleted By',
        'description_id' => 'Description ID',
        'description' => 'Description',
        'duration' => 'Duration',
        'edit' => 'Edit',
        'email' => 'Email',
        'end' => 'End',
        'event_category' => 'Event Category',
        'exception' => 'Exception',
        'facebook' => 'Facebook',
        'failed_at' => 'Failed At',
        'fax' => 'Fax',
        'file' => 'File',
        'first_name' => 'First Name',
        'first_page' => 'First Page',
        'gender' => 'Gender',
        'google_maps_iframe' => 'Google Maps Iframe',
        'google_maps' => 'Google Maps',
        'graduate' => 'Graduate',
        'history' => 'History',
        'icon' => 'Icon',
        'id' => 'ID',
        'image' => 'Image',
        'instagram' => 'Instagram',
        'issue' => 'Issue',
        'job' => 'Job',
        'journal_title' => 'Journal Title',
        'keyword' => 'Keyword',
        'last_name' => 'Last Name',
        'last_page' => 'Last Page',
        'link' => 'Link',
        'linkedin' => 'Linkedin',
        'location' => 'Location',
        'major' => 'Major',
        'menu_category' => 'Menu Category',
        'menu' => 'Menu',
        'message' => 'Message',
        'mission_id' => 'Mission ID',
        'mission' => 'Mission',
        'name_id' => 'Name ID',
        'name' => 'Name',
        'news_category' => 'News Category',
        'news' => 'News',
        'page' => 'Page',
        'password' => 'Password',
        'payload' => 'Payload',
        'phone' => 'Phone',
        'price' => 'Price',
        'public' => 'Public',
        'publication_date' => 'Publication Date',
        'publisher' => 'Publisher',
        'queue' => 'Queue',
        'remember_token' => 'Remember Token',
        'repository_subject_id' => 'Repository Subject',
        'repository_subject' => 'Repository Subject',
        'repository' => 'Repository',
        'role' => 'Role',
        'row' => 'Row',
        'scholar' => 'Scholar',
        'school' => 'School',
        'semester' => 'Semester',
        'sks' => 'SKS',
        'slug' => 'Slug',
        'sms' => 'SMS',
        'sort' => 'Sort',
        'start' => 'Start',
        'status' => 'Status',
        'tag_id' => 'Tag ID',
        'tag' => 'Tag',
        'title' => 'Title',
        'twitter' => 'Twitter',
        'type' => 'Type',
        'updated_at' => 'Updated At',
        'updated_by' => 'Updated By',
        'url' => 'URL',
        'user' => 'User',
        'username' => 'Username',
        'uuid' => 'UUID',
        'value' => 'Value',
        'video' => 'Video',
        'view' => 'View',
        'vision_id' => 'Vision ID',
        'vision' => 'Vision',
        'volume' => 'Volume',
        'whatsapp' => 'Whatsapp',
        'year' => 'Year',
        'youtube' => 'Youtube',
        'blog_category' => 'Blog Category',
    ],
];
