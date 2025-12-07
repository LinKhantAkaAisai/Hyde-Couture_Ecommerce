<?php
include '../connection/connectdb.php';
include '../layout/nav.php';
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>User Profile | MY GROODE</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css'>
    <link href='https://fonts.googleapis.com/css2?family=Sancreek&family=Cinzel:wght@400;500;600;700&family=Vollkorn:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&display=swap' rel='stylesheet'>
    <style>
        :root {
            --rolex-green: #006039;
            --rolex-gold: #C9B037;
            --white: #FFFFFF;
            --black: #000000;
            --gray-light: #F5F5F5;
            --gray-dark: #333333;
            --border-color: #e0e0e0;
            --red-remove: #d9534f; /* Custom red for remove button */
        }
        
        .for_profile * { margin: 0; padding: 0; box-sizing: border-box; }
        
        .for_profile {
            background-color: #f9f9f9;
            color: var(--black);
            font-family: 'Vollkorn', serif;
            min-height: 100vh;
        }

        .for_profile textarea {
            font-family: 'Vollkorn', serif;
        }

        .for_profile h1, .for_profile h2, .for_profile h3, .for_profile h4 { 
            font-family: 'Cinzel', serif; 
            color: var(--rolex-green); 
        }
        
        .for_profile .ordered-list-content p {
            margin-bottom: 15px;
            font-style: italic;
            color: #555;
        }

        .for_profile .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
        }

        .for_profile .page-title {
            font-size: 48px;
            color: var(--black);
            margin-bottom: 30px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .for_profile .card {
            background: var(--white);
            border-radius: 4px;
            padding: 30px;
            margin-bottom: 25px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }

        .for_profile .personal-layout {
            display: flex;
            gap: 40px;
            align-items: flex-start;
        }

        .for_profile .profile-pic-container {
            width: 150px;
            text-align: center;
        }

        .for_profile .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 12px;
            object-fit: cover;
            background-color: #ddd;
            margin-bottom: 10px;
        }

        .for_profile .profile-header-text {
            color: var(--rolex-green);
            font-size: 24px;
            margin-top: 10px;
            font-weight: 700;
            line-height: 1.2;
            text-transform: uppercase;
        }

        .for_profile .details-grid {
            flex: 1;
            display: grid;
            grid-template-columns: 120px 1fr;
            row-gap: 20px;
            align-items: center;
        }

        .for_profile .label {
            color: var(--gray-dark);
            font-weight: 600;
            font-size: 15px;
        }

        .for_profile .value {
            font-weight: 700;
            color: var(--black);
            font-size: 16px;
        }

        .for_profile .edit-btn-outline {
            grid-column: 2; /* Align with values */
            width: 120px;
            padding: 8px;
            background: transparent;
            border: 1px solid var(--rolex-green);
            color: var(--rolex-green);
            text-transform: uppercase;
            font-family: 'Cinzel', serif;
            font-weight: 600;
            cursor: pointer;
            margin-top: 10px;
            transition: all 0.3s;
        }

        .for_profile .edit-btn-outline:hover {
            background: var(--rolex-green);
            color: var(--white);
        }

        .for_profile .personal-edit-dropdown {
            display: none; /* Hidden by default */
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px dashed var(--border-color);
            background: #fdfdfd;
            padding: 20px;
            border: 1px solid var(--rolex-green);
        }

        .for_profile .form-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-family: 'Vollkorn', serif;
        }
        
        .for_profile .passcode-header {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
            color: var(--rolex-green);
            font-size: 18px;
            font-weight: 600;
        }

        .for_profile .passcode-form {
            max-width: 600px;
        }

        .for_profile .input-row {
            display: grid;
            grid-template-columns: 180px 1fr;
            align-items: center;
            margin-bottom: 15px;
        }

        .for_profile .warning-text {
            color: var(--red-remove);
            font-size: 12px;
            margin: 5px 0 15px 180px; 
            font-style: italic;
        }

        .for_profile .link-text {
            font-size: 12px;
            color: #888;
            margin-left: 180px;
            margin-bottom: 15px;
            display: block;
            text-decoration: none;
        }

        .for_profile .address-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .for_profile .add-new-btn {
            border: none;
            background: transparent;
            color: var(--black);
            font-family: 'Vollkorn', serif;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .for_profile .address-item {
            background: #fcfcfc;
            border-bottom: 1px solid var(--border-color);
            padding: 20px;
        }
        
        .for_profile .address-item:last-of-type {
            border-bottom: none;
        }

        .for_profile .address-accordion-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            color: var(--rolex-green);
            font-family: 'Cinzel', serif;
            font-size: 18px;
            margin-bottom: 0;
        }
        
        .for_profile .address-accordion-title span {
                display: flex;
                align-items: center;
        }

        .for_profile .address-content {
            display: none; /* Hidden unless active */
            padding-top: 15px;
            padding-left: 15px;
        }
        
        .for_profile .address-detail-grid {
            display: grid;
            grid-template-columns: 120px 1fr 120px 1fr; /* Label Value Label Value */
            gap: 10px 15px;
            margin-bottom: 15px;
        }
        
        .for_profile .address-detail-grid .addr-label {
            color: #666;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }
        
        .for_profile .address-detail-grid .addr-value {
                font-weight: 600; 
                color: #000;
        }

        .for_profile .address-full-row {
            grid-column: 1 / span 4;
            display: flex;
        }
        
        .for_profile .address-full-row .addr-label {
            width: 120px;
        }
        
        .for_profile .address-full-row .addr-value {
            flex: 1;
        }

        .for_profile .current-badge-wrapper {
            margin-left: 10px;
        }
        .for_profile .current-badge {
            display: inline-block;
            background: var(--rolex-green);
            color: var(--white);
            padding: 4px 10px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .for_profile .address-actions {
            margin-top: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .for_profile .btn-green {
            background-color: var(--rolex-green);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-family: 'Cinzel', serif;
        }
        
        .for_profile .btn-remove {
            background: var(--red-remove);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-family: 'Cinzel', serif;
        }
        
        .for_profile .btn-set-current {
                background: transparent;
                border: 1px solid var(--rolex-green);
                color: var(--rolex-green);
                padding: 10px 20px;
                border-radius: 4px;
                cursor: pointer;
                font-family: 'Cinzel', serif;
        }
        
        .for_profile .btn-set-current:hover {
            background: var(--rolex-green);
            color: var(--white);
        }

        .for_profile .address-form-container {
            background: #f0f4f2;
            padding: 20px;
            margin-top: 15px;
            border-radius: 8px;
            display: none;
        }

        .for_profile .form-grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        @media (max-width: 768px) {

            .for_profile .personal-layout { 
            flex-direction: row; 
            align-items: flex-start; 
            gap: 15px;
        }

        .for_profile .profile-pic-container {
            width: 80px;
            text-align: center;
        }

        .for_profile .profile-img {
            width: 80px;
            height: 80px;
        }

        .for_profile .profile-header-text {
            font-size: 16px;
        }

        .for_profile .details-grid {
            grid-template-columns: 90px 1fr; /* smaller labels */
            row-gap: 10px;
        }

        .for_profile .label { font-size: 12px; }
        .for_profile .value { font-size: 13px; }

        .for_profile .edit-btn-outline {
            width: 90px;
            padding: 5px;
            font-size: 11px;
        }

        .for_profile .personal-edit-dropdown {
            padding: 15px;
        }

        .for_profile .personal-edit-dropdown .form-grid-2 {
            grid-template-columns: 1fr; 
            gap: 10px;
        }

        .for_profile .form-input {
            width: 100%;
            font-size: 13px; 
            padding: 8px;
        }

        .for_profile .address-detail-grid {
            grid-template-columns: 1fr 1fr; 
            gap: 10px 10px;
        }

        .for_profile .address-detail-grid .addr-label {
            font-size: 12px;
        }

        .for_profile .address-detail-grid .addr-value {
            font-size: 13px;
        }

        .for_profile .address-full-row .addr-label {
            width: 100px;
            font-size: 12px;
        }

        .for_profile .address-full-row .addr-value {
            font-size: 13px;
        }

        .for_profile .address-actions button {
            padding: 8px 12px;
            font-size: 12px;
        }

        .for_profile .address-form-container .form-input {
            font-size: 13px;
            padding: 8px;
        }

        .for_profile .address-form-container .form-grid-2 {
            grid-template-columns: 1fr;
            gap: 10px;
        }
    }
    </style>
</head>
<body>

    <div class='for_profile'>
    
        <div class='container'>

            <div class='card'>
                <div class='personal-layout'>
                    <div class='profile-pic-container'>
                        <img src='../image/taylor.jpg' alt='Profile' class='profile-img'>
                        <div class='profile-header-text'>
                            PERSONAL<br>DETAIL
                        </div>
                    </div>

                    <div class='details-grid'>
                        <div class='label'>Name</div>
                        <div class='value' id='display-name'>Juila Rayban</div>

                        <div class='label'>Account id :</div>
                        <div class='value'>0001</div>

                        <div class='label'>Phone no :</div>
                        <div class='value' id='display-phone'>09-123 123 123</div>

                        <div class='label'>Email</div>
                        <div class='value' id='display-email'>juilarayban@gmail.com</div>

                        <div class='label'>Birthday</div>
                        <div class='value' id='display-birth'>Jan 1 2000</div>

                        <button class='edit-btn-outline' onclick='togglePersonalEdit()'>EDIT</button>
                    </div>
                </div>

                <div class='personal-edit-dropdown' id='personal-edit-form'>
                    <div class='form-grid-2'>
                        <div class='form-group'>
                            <label class='label'>Name</label>
                            <input type='text' id='edit-name' class='form-input' value='Juila Rayban'>
                        </div>
                        <div class='form-group'>
                            <label class='label'>Phone</label>
                            <input type='text' id='edit-phone' class='form-input' value='09-123 123 123'>
                        </div>
                        <div class='form-group'>
                            <label class='label'>Email</label>
                            <input type='email' id='edit-email' class='form-input' value='juilarayban@gmail.com'>
                        </div>
                        
                        <div class='form-group'>
                            <label class='label'>Birthday</label>
                            <input type='date' id='edit-birthdate' class='form-input' max="<?= date('Y-m-d') ?>" value="2000-01-01">
                        </div>
                        <div class='form-group'>
                            <label class='label'>Profile Pic</label>
                            <input type='file' id='edit-profile-pic' class='form-input' accept='image/*'>
                        </div>   

                    </div>
                    <div style='margin-top: 15px; text-align: right;'>
                        <button class='btn-green' onclick='savePersonalDetail()'>Save</button>
                    </div>
                </div>
            </div>

            <div class='card'>
                <div class='passcode-header'>
                    <i class='fas fa-lock'></i> Change Passcode
                </div>
                <div class='passcode-form'>
                    <div class='input-row'>
                        <label class='label'>Old passcode :</label>
                        <input type='password' class='form-input'>
                    </div>
                    
                    <div class='input-row'>
                        <label class='label'>New passcode :</label>
                        <input type='password' class='form-input'>
                    </div>
                    <div class='warning-text'>
                        *Password must contain at least 8 characters,<br>including the number other symbols.
                    </div>

                    <div class='input-row'>
                        <label class='label'>Confirm<br>new passcode :</label>
                        <input type='password' class='form-input'>
                    </div>

                    <a href='#' class='link-text'>Forget Passcode ?</a>

                    <div style='text-align: right;'>
                        <button class='btn-green'>Change Passcode</button>
                    </div>
                </div>
            </div>

            <div class='card'>
                <div class='address-header'>
                    <h2 style='font-size: 24px;'>ADDRESS LIST</h2>
                    <button class='add-new-btn' onclick='openNewAddressForm()'><i class='fas fa-plus'></i> Add New</button>
                </div>

                <div id='address-container'>
                </div>

                <div id='new-address-form-wrapper' class='address-form-container' style='border: 2px solid var(--rolex-green);'>
                    <h3 style='margin-bottom:15px;'>Add New Address</h3>
                    <div id='dynamic-new-form-fields'></div>
                    <div style='margin-top:15px; display:flex; gap:10px; justify-content:flex-end;'>
                        <button class='btn-remove' onclick='closeNewAddressForm()' style='background: #ccc; color: #333;'>Cancel</button>
                        <button class='btn-green' onclick='saveNewAddress()'>Save Address</button>
                    </div>
                </div>
            </div>

            <div class='card'>
                <h2 style='font-size: 24px; margin-bottom: 20px;'>ORDERED LIST</h2>
                <div class='ordered-list-content'>
                    <p>Check your ordered list here .</p>
                    <button class='btn-green' style='background-color: #006039; padding: 12px 30px;'>Order lists</button>
                </div>
            </div>
        </div>

    <script>

        function populateDateSelectors() {
            const monthSelect = document.getElementById('edit-birth-month');
            const daySelect = document.getElementById('edit-birth-day');
            const yearSelect = document.getElementById('edit-birth-year');
            
            monthSelect.innerHTML = '<option value="" selected disabled>Month</option>';
            daySelect.innerHTML = '<option value="" selected disabled>Day</option>';
            yearSelect.innerHTML = '<option value="" selected disabled>Year</option>';

            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            months.forEach((month, index) => {
                const opt = new Option(month, index + 1);
                monthSelect.add(opt);
            });

            for (let i = 1; i <= 31; i++) {
                const opt = new Option(i, i);
                daySelect.add(opt);
            }

            const currentYear = new Date().getFullYear();
            for (let i = currentYear; i >= currentYear - 100; i--) {
                const opt = new Option(i, i);
                yearSelect.add(opt);
            }
        }
        
        function togglePersonalEdit() {
            const form = document.getElementById('personal-edit-form');
            form.style.display = form.style.display === 'block' ? 'none' : 'block';

            if (form.style.display === 'block') {
                // Pre-fill name, phone, email
                document.getElementById('edit-name').value = document.getElementById('display-name').textContent;
                document.getElementById('edit-phone').value = document.getElementById('display-phone').textContent;
                document.getElementById('edit-email').value = document.getElementById('display-email').textContent;

                // Pre-fill birthday input
                const birthText = document.getElementById('display-birth').textContent;
                const birthDate = new Date(birthText);
                if (!isNaN(birthDate)) {
                    document.getElementById('edit-birthdate').value = birthDate.toISOString().split('T')[0];
                }

                // Set max date to today
                document.getElementById('edit-birthdate').max = new Date().toISOString().split('T')[0];
            }
        }

        const myanmarCities = [
            {'name_en': 'Yangon'}, {'name_en': 'Mandalay'}, {'name_en': 'Nay Pyi Taw'}, {'name_en': 'Mawlamyine'}, {'name_en': 'Bago'},
            {'name_en': 'Pathein'}, {'name_en': 'Monywa'}, {'name_en': 'Meiktila'}, {'name_en': 'Taunggyi'}, {'name_en': 'Myitkyina'},
            {'name_en': 'Lashio'}, {'name_en': 'Sittwe'}, {'name_en': 'Pyay'}, {'name_en': 'Hinthada'}, {'name_en': 'Magway'},
            {'name_en': 'Myeik'}, {'name_en': 'Taungoo'}, {'name_en': 'Myingyan'}, {'name_en': 'Dawei'}, {'name_en': 'Pakokku'},
            {'name_en': 'Pyin Oo Lwin'}, {'name_en': 'Hpa-An'}, {'name_en': 'Kyaukse'}, {'name_en': 'Shwebo'}, {'name_en': 'Sagaing'},
            {'name_en': 'Tachileik'}, {'name_en': 'Hakha'}, {'name_en': 'Loikaw'}, {'name_en': 'Kengtung'}, {'name_en': 'Thanlyin'},
            {'name_en': 'Twantay'}, {'name_en': 'Kyauktan'}, {'name_en': 'Bogale'}, {'name_en': 'Pyapon'}, {'name_en': 'Kyaiklat'},
            {'name_en': 'Maubin'}, {'name_en': 'Nyaungdon'}, {'name_en': 'Dedaye'}, {'name_en': 'Kyaukpyu'}, {'name_en': 'Thandwe'},
            {'name_en': 'Toungup'}, {'name_en': 'Gwa'}, {'name_en': 'Manaung'}, {'name_en': 'Kyeintali'}, {'name_en': 'Minbya'},
            {'name_en': 'Mrauk-U'}, {'name_en': 'Pauktaw'}, {'name_en': 'Myebon'}, {'name_en': 'Ann'}, {'name_en': 'Buthidaung'},
            {'name_en': 'Maungdaw'}, {'name_en': 'Kyauktaw'}, {'name_en': 'Ponnagyun'}, {'name_en': 'Rathedaung'}, {'name_en': 'Kawthaung'},
            {'name_en': 'Bokpyin'}, {'name_en': 'Yebyu'}, {'name_en': 'Launglon'}, {'name_en': 'Thayetchaung'}, {'name_en': 'Tanintharyi'},
            {'name_en': 'Kyunsu'}, {'name_en': 'Myitta'}, {'name_en': 'Kawkareik'}, {'name_en': 'Myawaddy'}, {'name_en': 'Kyeikdon'},
            {'name_en': 'Kyeikmaraw'}, {'name_en': 'Hlaingbwe'} , {'name_en' : 'Other'}
        ];

        const thailandCities = [
            {'name_en': 'Bangkok'}, {'name_en': 'Samut Prakan'}, {'name_en': 'Nonthaburi'}, {'name_en': 'Pathum Thani'}, {'name_en': 'Phra Nakhon Si Ayutthaya'},
            {'name_en': 'Ang Thong'}, {'name_en': 'Loburi'}, {'name_en': 'Sing Buri'}, {'name_en': 'Chai Nat'}, {'name_en': 'Saraburi'},
            {'name_en': 'Chon Buri'}, {'name_en': 'Rayong'}, {'name_en': 'Chanthaburi'}, {'name_en': 'Trat'}, {'name_en': 'Chachoengsao'},
            {'name_en': 'Prachin Buri'}, {'name_en': 'Nakhon Nayok'}, {'name_en': 'Sa Kaeo'}, {'name_en': 'Nakhon Ratchasima'}, {'name_en': 'Buri Ram'},
            {'name_en': 'Surin'}, {'name_en': 'Si Sa Ket'}, {'name_en': 'Ubon Ratchathani'}, {'name_en': 'Yasothon'}, {'name_en': 'Chaiyaphum'},
            {'name_en': 'Amnat Charoen'}, {'name_en': 'Bueng Kan'}, {'name_en': 'Nong Bua Lam Phu'}, {'name_en': 'Khon Kaen'}, {'name_en': 'Udon Thani'},
            {'name_en': 'Loei'}, {'name_en': 'Nong Khai'}, {'name_en': 'Maha Sarakham'}, {'name_en': 'Roi Et'}, {'name_en': 'Kalasin'},
            {'name_en': 'Sakon Nakhon'}, {'name_en': 'Nakhon Phanom'}, {'name_en': 'Mukdahan'}, {'name_en': 'Chiang Mai'}, {'name_en': 'Lamphun'},
            {'name_en': 'Lampang'}, {'name_en': 'Uttaradit'}, {'name_en': 'Phrae'}, {'name_en': 'Nan'}, {'name_en': 'Phayao'},
            {'name_en': 'Chiang Rai'}, {'name_en': 'Mae Hong Son'}, {'name_en': 'Nakhon Sawan'}, {'name_en': 'Uthai Thani'}, {'name_en': 'Kamphaeng Phet'},
            {'name_en': 'Tak'}, {'name_en': 'Sukhothai'}, {'name_en': 'Phitsanulok'}, {'name_en': 'Phichit'}, {'name_en': 'Phetchabun'},
            {'name_en': 'Ratchaburi'}, {'name_en': 'Kanchanaburi'}, {'name_en': 'Suphan Buri'}, {'name_en': 'Nakhon Pathom'}, {'name_en': 'Samut Sakhon'},
            {'name_en': 'Samut Songkhram'}, {'name_en': 'Phetchaburi'}, {'name_en': 'Prachuap Khiri Khan'}, {'name_en': 'Nakhon Si Thammarat'}, {'name_en': 'Krabi'},
            {'name_en': 'Phangnga'}, {'name_en': 'Phuket'}, {'name_en': 'Surat Thani'}, {'name_en': 'Ranong'}, {'name_en': 'Chumphon'},
            {'name_en': 'Songkhla'}, {'name_en': 'Satun'}, {'name_en': 'Trang'}, {'name_en': 'Phatthalung'}, {'name_en': 'Pattani'},
            {'name_en': 'Yala'}, {'name_en': 'Narathiwat'}, {'name_en' : 'Other'}
        ];
        
         let addressData = [
            { id: 1, isCurrent: true, street: 'Yadanar Street', township: 'Chanayethazan', city: 'Mandalay', state: 'Mandalay', country: 'Myanmar', postal: '1001', map: 'maplink1', fullAddress: 'Yadanar Street, Chanayethazan Township, Mandalay, Mandalay Region'},
            { id: 2, isCurrent: false, street: 'Second Road', township: 'Bauktaw', city: 'Yangon', state: 'Yangon', country: 'Myanmar', postal: '1002', map: 'maplink2', fullAddress: 'Second Road, Bauktaw Township, Yangon, Yangon Region'},
        ];
        
        let nextAddressId = 3;

        const addressFormTemplate = (addr) => `
                <div class='form-grid-2'>
                    <div class='form-group'>
                        <label class='label'>Street</label>
                        <input type='text' class='form-input addr-street' placeholder='Street Address' value='${addr?.street || ''}'>
                    </div>
                    <div class='form-group'>
                        <label class='label'>Township</label>
                        <input type='text' class='form-input addr-township' placeholder='Township' value='${addr?.township || ''}'>
                    </div>
                </div>
                <div class='form-grid-2'>
                        <div class='form-group'>
                        <label class='label'>State</label>
                        <input type='text' class='form-input addr-state' placeholder='State/Province' value='${addr?.state || ''}'>
                    </div>
                    <div class='form-group'>
                        <label class='label'>Postal Code</label>
                        <input type='text' class='form-input addr-postal' placeholder='Postal Code' value='${addr?.postal || ''}'>
                    </div>
                </div>
                <div class='form-grid-2'>
                    <div class='form-group'>
                        <label class='label'>Country</label>
                        <select class='form-input addr-country' onchange='updateCities(this)' data-selected='${addr?.country || ''}'>
                            <option value=''>Select Country</option>
                            <option value='Myanmar'>Myanmar</option>
                            <option value='Thailand'>Thailand</option>
                        </select>
                    </div>
                    <div class='form-group'>
                        <label class='label'>City</label>
                        <select class='form-input addr-city' data-selected='${addr?.city || ''}'>
                            <option value=''>Select City</option>
                        </select>
                    </div>
                </div>
                <div class='form-group' style='margin-top:15px;'>
                    <label class='label'>Complete Address</label>
                    <textarea class='form-input addr-complete' rows='2' placeholder='Full Address string'>${addr?.fullAddress || ''}</textarea>
                </div>
                <div class='form-group' style='margin-top:15px;'>
                    <label class='label'>Google Map Link</label>
                    <input type='text' class='form-input addr-map' value='${addr?.map || ''}'>
                </div>
            `;
        
        function updateCities(countrySelect, cityValue = '') {
            const row = countrySelect.closest('.address-form-container') || countrySelect.closest('.form-grid-2').parentNode;
            const citySelect = row.querySelector('.addr-city');
            const country = countrySelect.value;
            
           citySelect.innerHTML = '<option value="">Select City</option>';

            let cities = [];
            if (country === 'Myanmar') {
                cities = myanmarCities.map(c => c.name_en);
            } else if (country === 'Thailand') {
                cities = thailandCities.map(c => c.name_en);
            }

            cities.forEach(city => {
                const opt = document.createElement('option');
                opt.value = city;
                opt.textContent = city;
                if (city === cityValue) {
                    opt.selected = true;
                }
                citySelect.appendChild(opt);
            });
        }
        
        function loadCountryCity(formContainer, countryValue, cityValue) {
            const countrySelect = formContainer.querySelector('.addr-country');
            countrySelect.value = countryValue;
            updateCities(countrySelect, cityValue);
        }

        function toggleAddress(id) {
            const content = document.getElementById(`addr-content-${id}`);
            const chevron = document.querySelector(`.address-accordion-title[data-id='${id}'] i`);
            
            const isClosing = content.style.display === 'block';

            document.querySelectorAll('.address-content').forEach(el => el.style.display = 'none');
            document.querySelectorAll('.address-form-container').forEach(el => el.style.display = 'none');
            document.querySelectorAll('.address-accordion-title i').forEach(i => i.className = 'fas fa-chevron-right');
            closeNewAddressForm();

            if (isClosing) {
                content.style.display = 'none';
                chevron.className = 'fas fa-chevron-right';
            } else {
                content.style.display = 'block';
                chevron.className = 'fas fa-chevron-down';
            }
        }

        function editAddress(id) {
            const addr = addressData.find(a => a.id === id);
            if (!addr) return;
            
            document.getElementById(`addr-content-${id}`).style.display = 'none';
            document.querySelectorAll('.address-form-container').forEach(el => el.style.display = 'none');
            closeNewAddressForm();

            const container = document.getElementById(`edit-form-container-${id}`);
            container.innerHTML = `
                ${addressFormTemplate(addr)}
                <div style='margin-top:15px; text-align:right;'>
                    <button class='btn-green' onclick='saveAddress(${id}, 'edit')'>Save Changes</button>
                    <button class='btn-remove' style='background:#ccc; color:#333;' onclick='closeEdit(${id})'>Cancel</button>
                </div>
            `;
            container.style.display = 'block';
            loadCountryCity(container, addr.country, addr.city);
        }

        function closeEdit(id) {
            document.getElementById(`edit-form-container-${id}`).style.display = 'none';
            toggleAddress(id); 
            renderAddresses();
        }

        function closeNewAddressForm() {
             document.getElementById('new-address-form-wrapper').style.display = 'none';
        }

        function openNewAddressForm() {
            document.querySelectorAll('.address-form-container').forEach(el => el.style.display = 'none');
            document.querySelectorAll('.address-content').forEach(el => el.style.display = 'none');
            document.querySelectorAll('.address-accordion-title i').forEach(i => i.className = 'fas fa-chevron-right');

            const container = document.getElementById('dynamic-new-form-fields');
            container.innerHTML = addressFormTemplate(null); 
            document.getElementById('new-address-form-wrapper').style.display = 'block';
        }

        function renderAddresses() {
            const container = document.getElementById('address-container');
            container.innerHTML = '';

            addressData.forEach((addr, index) => {
                const addressNumber = index + 1;
                const item = document.createElement('div');
                item.className = 'address-item';
                
                const contentEl = document.getElementById(`addr-content-${addr.id}`);
                const isExpanded = contentEl && contentEl.style.display === 'block';

                const chevronClass = isExpanded ? 'fa-chevron-down' : 'fa-chevron-right';
                const contentDisplay = isExpanded ? 'block' : 'none';

                const currentBadgeHtml = addr.isCurrent ? 
                    `<div class='current-badge-wrapper'></div>` : 
                    '';

                item.innerHTML = `
                    <div class='address-accordion-title' onclick='toggleAddress(${addr.id})' data-id='${addr.id}'>
                        <span><i class='fas ${chevronClass}'></i> ADDRESS ${addressNumber}</span>
                        ${currentBadgeHtml}
                    </div>
                    
                    <div class='address-content' id='addr-content-${addr.id}' style='display: ${contentDisplay};'>
                        
                        <div class='address-detail-grid'>
                            <div class='addr-label'>Street</div>
                            <div class='addr-value'>${addr.street || '-'}</div>
                            <div class='addr-label'>Township</div>
                            <div class='addr-value'>${addr.township || '-'}</div>
                            
                            <div class='addr-label'>City</div>
                            <div class='addr-value'>${addr.city || '-'}</div>
                            <div class='addr-label'>State</div>
                            <div class='addr-value'>${addr.state || '-'}</div>

                            <div class='addr-label'>Country</div>
                            <div class='addr-value'>${addr.country || '-'}</div>
                            <div class='addr-label'>Postal Code</div>
                            <div class='addr-value'>${addr.postal || '-'}</div>
                            
                            <div class='address-full-row'>
                                <div class='addr-label'>Full Address</div>
                                <div class='addr-value'>${addr.fullAddress || '-'}</div>
                            </div>
                            <div class='address-full-row'>
                                <div class='addr-label'>Map Link</div>
                                <div class='addr-value'>${addr.map || '-'}</div>
                            </div>
                        </div>
                        
                        <div class='address-actions'>
                            <button class='btn-green' onclick='editAddress(${addr.id})'>Edit</button>
                            <button class='btn-remove' onclick='removeAddress(${addr.id})'>Remove</button>
                        </div>
                    </div>
                    <div id='edit-form-container-${addr.id}' class='address-form-container'></div>
                `;
                container.appendChild(item);
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            renderAddresses();
        });
    </script>
</body>
</html>
<?php
    include '../layout/footer.php';
?>