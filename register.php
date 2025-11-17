
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Login & Sign Up | GUESS</title>

<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500&family=Vollkorn&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Sancreek&display=swap" rel="stylesheet">

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Vollkorn', serif;
    }

    body {
        background-color: #f8f8f8;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        padding: 20px;
    }

    .container {
        width: 100%;
        max-width: 1200px;
        background: #fff;
        box-shadow: 0 0 25px rgba(0,0,0,0.1);
        border-radius: 15px;
        overflow: hidden;
        display: flex;
        flex-wrap: wrap;
        position: relative;
    }

    /* RESET BODY & PREVENT FLEX FROM BREAKING NAV */
body {
    display: block !important;
    margin: 0;
    padding: 0;
    min-height: 100vh;
    background-color: #f8f8f8;
}

.container {
    margin-top: 80px; /* Space for fixed/sticky nav */
    width: 100%;
    max-width: 1200px;
    margin-left: auto;
    margin-right: auto;
    padding: 20px;
}

    .forms {
        width: 50%;
        padding: 40px;
        transition: all 0.5s ease;
        overflow-y: auto;
        max-height: 90vh;
    }

    .form-box {
        display: none;
    }

    .form-box.active {
        display: block;
    }

    h2 {
        font-family: 'Cinzel', serif;
        font-size: 28px;
        margin-bottom: 25px;
        text-align: center;
        color: #222;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-size: 15px;
        color: #333;
        font-weight: 500;
    }

    input, select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 6px;
        margin-bottom: 15px;
        font-size: 15px;
        transition: border-color 0.3s ease;
    }

    input:focus, select:focus, textarea:focus {
        outline: none;
        border-color: #51d985;
        box-shadow: 0 0 0 2px rgba(81, 217, 133, 0.2);
    }

    button {
        width: 100%;
        padding: 12px;
        background: black;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 15px;
        cursor: pointer;
        transition: background 0.3s ease;
        font-weight: 600;
    }

    button:hover {
        background: #444;
    }

    .toggle-section {
        width: 50%;
        background: #51d985;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: white;
        position: relative;
        padding: 40px 20px;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
        border-radius: 0 15px 15px 0;
    }

    .content {
        position: relative;
        z-index: 2;
        text-align: center;
        width: 100%;
        max-width: 400px;
    }

    .brand-name {
        font-family: 'Sancreek', cursive;
        font-size: 40px;
        letter-spacing: 2px;
        margin-bottom: 20px;
    }

    .toggle-btn {
        background: transparent;
        border: 2px solid white;
        padding: 10px 25px;
        border-radius: 6px;
        color: white;
        font-size: 15px;
        cursor: pointer;
        transition: all 0.3s ease;
        width: auto;
        display: inline-block;
    }

    textarea {
        margin-bottom: 15px;
        resize: vertical;
        min-height: 100px;
    }

    .toggle-btn:hover {
        background: white;
        color: black;
    }

    /* Form Grid Layout for larger screens */
    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }

    .form-grid .form-group {
        margin-bottom: 15px;
    }

    .form-group.full-width {
        grid-column: 1 / -1;
    }

    /* Responsive Design */
    
    /* Laptop (1024px and below) */
    @media (max-width: 1024px) {
        .forms {
            padding: 30px;
        }
        
        .toggle-section {
            padding: 30px 20px;
        }
        
        .brand-name {
            font-size: 36px;
        }
    }
    
    /* Tablet (768px and below) */
    @media (max-width: 768px) {
        .container {
            flex-direction: column;
            max-width: 600px;
        }
        
        .forms, .toggle-section {
            width: 100%;
        }
        
        .forms {
            padding: 30px;
            max-height: none;
        }
        
        .toggle-section {
            padding: 40px 20px;
            order: -1;
        }
        
        .brand-name {
            font-size: 32px;
        }
        
        h2 {
            font-size: 24px;
        }
        
        .form-grid {
            grid-template-columns: 1fr;
            gap: 0;
        }
    }
    
    /* Mobile (480px and below) */
    @media (max-width: 480px) {
        body {
            padding: 10px;
        }
        
        .container {
            border-radius: 10px;
        }
        
        .forms {
            padding: 20px;
        }
        
        .toggle-section {
            padding: 30px 15px;
        }
        
        .brand-name {
            font-size: 28px;
            margin-bottom: 15px;
        }
        
        h2 {
            font-size: 22px;
            margin-bottom: 20px;
        }
        
        input, select, textarea {
            padding: 10px;
            font-size: 14px;
        }
        
        button {
            padding: 10px;
            font-size: 14px;
        }
        
        .toggle-btn {
            padding: 8px 20px;
            font-size: 14px;
        }
        
        label {
            font-size: 14px;
        }
    }
    
    /* Small Mobile (360px and below) */
    @media (max-width: 360px) {
        .forms {
            padding: 15px;
        }
        
        .toggle-section {
            padding: 25px 10px;
        }
        
        .brand-name {
            font-size: 24px;
        }
        
        h2 {
            font-size: 20px;
        }
    }
    
    /* Large Desktop (1440px and above) */
    @media (min-width: 1440px) {
        .container {
            max-width: 1400px;
        }
        
        .forms {
            padding: 60px;
        }
        
        .toggle-section {
            padding: 60px 40px;
        }
    }
    
    /* Form scrolling for very small screens */
    @media (max-height: 700px) and (min-width: 769px) {
        .forms {
            max-height: 80vh;
            overflow-y: auto;
        }
    }
</style>
</head>
<body>

<?php include "../layout/nav.php"; ?>

<div class="container">
    <div class="forms">
        <div class="form-box active" id="login-box">
            <h2>Login</h2>
            <form>
                <label for="login-email">Email</label>
                <input type="email" id="login-email" placeholder="Enter your email" required>

                <label for="login-password">Password</label>
                <input type="password" id="login-password" placeholder="Enter your password" required>

                <button type="submit">Login</button>
            </form>
        </div>

        <!-- Sign Up Form -->
        <div class="form-box" id="signup-box">
            <h2>Create Account</h2>
            <form id="signup-form">
                <div class="form-grid">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" id="signup-name" placeholder="Enter your name" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="tel" id="signup-phone" placeholder="Enter your phone number" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" id="signup-email" placeholder="Enter your email" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Birthday</label>
                        <input type="date" id="signup-birthday" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" id="signup-password" placeholder="Create a password" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Country</label>
                        <select id="country" required>
                            <option value="">Select Country</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Street</label>
                        <input type="text" id="street" placeholder="Street Address" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Township</label>
                        <input type="text" id="township" placeholder="Township" required>
                    </div>
                    
                    <div class="form-group">
                        <label>State</label>
                        <input type="text" id="state" placeholder="State/Province" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Postal Code</label>
                        <input type="text" id="postal" placeholder="Postal Code" required>
                    </div>
                    
                    <div class="form-group">
                        <label>City</label>
                        <select id="city" required>
                            <option value="">Select City</option>
                        </select>

                    </div>
                    <div class="form-group full-width">
                        <label>Google Map Link</label>
                        <input type="text" id="google_link" placeholder="Google Map Link" required>
                    </div>
                    
                    <div class="form-group full-width">
                        <label>Complete Address</label>
                        <textarea id="complete_address" rows="4" placeholder="Enter Complete Address" required></textarea>
                    </div>
                    
                    
                </div>
                
                <button type="submit">Sign Up</button>
            </form>
        </div>
    </div>

    <!-- Toggle Section -->
    <div class="toggle-section">
        <div class="overlay"></div>
        <div class="content">
            <div class="brand-name">HYDE COUTURE</div>
            <p style="font-size: 17px; margin-bottom: 20px;">Welcome to HYDE COUTURE</p>
            <button class="toggle-btn" id="toggle-btn">Sign Up</button>
        </div>
    </div>
</div>

<script>
    // Form toggle
    const toggleBtn = document.getElementById('toggle-btn');
    const loginBox = document.getElementById('login-box');
    const signupBox = document.getElementById('signup-box');
    let showSignup = false;

    toggleBtn.addEventListener('click', () => {
        showSignup = !showSignup;
        if (showSignup) {
            loginBox.classList.remove('active');
            signupBox.classList.add('active');
            toggleBtn.textContent = 'Login';
        } else {
            signupBox.classList.remove('active');
            loginBox.classList.add('active');
            toggleBtn.textContent = 'Sign Up';
        }
    });

    // City data parsed from your JSON files
    const myanmarCities = [
        {"name_en": "Yangon"}, {"name_en": "Mandalay"}, {"name_en": "Nay Pyi Taw"}, {"name_en": "Mawlamyine"}, {"name_en": "Bago"},
        {"name_en": "Pathein"}, {"name_en": "Monywa"}, {"name_en": "Meiktila"}, {"name_en": "Taunggyi"}, {"name_en": "Myitkyina"},
        {"name_en": "Lashio"}, {"name_en": "Sittwe"}, {"name_en": "Pyay"}, {"name_en": "Hinthada"}, {"name_en": "Magway"},
        {"name_en": "Myeik"}, {"name_en": "Taungoo"}, {"name_en": "Myingyan"}, {"name_en": "Dawei"}, {"name_en": "Pakokku"},
        {"name_en": "Pyin Oo Lwin"}, {"name_en": "Hpa-An"}, {"name_en": "Kyaukse"}, {"name_en": "Shwebo"}, {"name_en": "Sagaing"},
        {"name_en": "Tachileik"}, {"name_en": "Hakha"}, {"name_en": "Loikaw"}, {"name_en": "Kengtung"}, {"name_en": "Thanlyin"},
        {"name_en": "Twantay"}, {"name_en": "Kyauktan"}, {"name_en": "Bogale"}, {"name_en": "Pyapon"}, {"name_en": "Kyaiklat"},
        {"name_en": "Maubin"}, {"name_en": "Nyaungdon"}, {"name_en": "Dedaye"}, {"name_en": "Kyaukpyu"}, {"name_en": "Thandwe"},
        {"name_en": "Toungup"}, {"name_en": "Gwa"}, {"name_en": "Manaung"}, {"name_en": "Kyeintali"}, {"name_en": "Minbya"},
        {"name_en": "Mrauk-U"}, {"name_en": "Pauktaw"}, {"name_en": "Myebon"}, {"name_en": "Ann"}, {"name_en": "Buthidaung"},
        {"name_en": "Maungdaw"}, {"name_en": "Kyauktaw"}, {"name_en": "Ponnagyun"}, {"name_en": "Rathedaung"}, {"name_en": "Kawthaung"},
        {"name_en": "Bokpyin"}, {"name_en": "Yebyu"}, {"name_en": "Launglon"}, {"name_en": "Thayetchaung"}, {"name_en": "Tanintharyi"},
        {"name_en": "Kyunsu"}, {"name_en": "Myitta"}, {"name_en": "Kawkareik"}, {"name_en": "Myawaddy"}, {"name_en": "Kyeikdon"},
        {"name_en": "Kyeikmaraw"}, {"name_en": "Hlaingbwe"} , {"name_en" : "Other"}
    ];

    const thailandCities = [
        {"name_en": "Bangkok"}, {"name_en": "Samut Prakan"}, {"name_en": "Nonthaburi"}, {"name_en": "Pathum Thani"}, {"name_en": "Phra Nakhon Si Ayutthaya"},
        {"name_en": "Ang Thong"}, {"name_en": "Loburi"}, {"name_en": "Sing Buri"}, {"name_en": "Chai Nat"}, {"name_en": "Saraburi"},
        {"name_en": "Chon Buri"}, {"name_en": "Rayong"}, {"name_en": "Chanthaburi"}, {"name_en": "Trat"}, {"name_en": "Chachoengsao"},
        {"name_en": "Prachin Buri"}, {"name_en": "Nakhon Nayok"}, {"name_en": "Sa Kaeo"}, {"name_en": "Nakhon Ratchasima"}, {"name_en": "Buri Ram"},
        {"name_en": "Surin"}, {"name_en": "Si Sa Ket"}, {"name_en": "Ubon Ratchathani"}, {"name_en": "Yasothon"}, {"name_en": "Chaiyaphum"},
        {"name_en": "Amnat Charoen"}, {"name_en": "Bueng Kan"}, {"name_en": "Nong Bua Lam Phu"}, {"name_en": "Khon Kaen"}, {"name_en": "Udon Thani"},
        {"name_en": "Loei"}, {"name_en": "Nong Khai"}, {"name_en": "Maha Sarakham"}, {"name_en": "Roi Et"}, {"name_en": "Kalasin"},
        {"name_en": "Sakon Nakhon"}, {"name_en": "Nakhon Phanom"}, {"name_en": "Mukdahan"}, {"name_en": "Chiang Mai"}, {"name_en": "Lamphun"},
        {"name_en": "Lampang"}, {"name_en": "Uttaradit"}, {"name_en": "Phrae"}, {"name_en": "Nan"}, {"name_en": "Phayao"},
        {"name_en": "Chiang Rai"}, {"name_en": "Mae Hong Son"}, {"name_en": "Nakhon Sawan"}, {"name_en": "Uthai Thani"}, {"name_en": "Kamphaeng Phet"},
        {"name_en": "Tak"}, {"name_en": "Sukhothai"}, {"name_en": "Phitsanulok"}, {"name_en": "Phichit"}, {"name_en": "Phetchabun"},
        {"name_en": "Ratchaburi"}, {"name_en": "Kanchanaburi"}, {"name_en": "Suphan Buri"}, {"name_en": "Nakhon Pathom"}, {"name_en": "Samut Sakhon"},
        {"name_en": "Samut Songkhram"}, {"name_en": "Phetchaburi"}, {"name_en": "Prachuap Khiri Khan"}, {"name_en": "Nakhon Si Thammarat"}, {"name_en": "Krabi"},
        {"name_en": "Phangnga"}, {"name_en": "Phuket"}, {"name_en": "Surat Thani"}, {"name_en": "Ranong"}, {"name_en": "Chumphon"},
        {"name_en": "Songkhla"}, {"name_en": "Satun"}, {"name_en": "Trang"}, {"name_en": "Phatthalung"}, {"name_en": "Pattani"},
        {"name_en": "Yala"}, {"name_en": "Narathiwat"}, {"name_en" : "Other"}
    ];

    const countrySelect = document.getElementById('country');
    const citySelect = document.getElementById('city');

    // Populate country dropdown
    const countries = ['Myanmar', 'Thailand'];
    countries.forEach(c => {
        const opt = document.createElement('option');
        opt.value = c;
        opt.textContent = c;
        countrySelect.appendChild(opt);
    });

    // On country change, load corresponding cities
    countrySelect.addEventListener('change', () => {
        const country = countrySelect.value;
        citySelect.innerHTML = '<option value="">Select City</option>';

        let cities = [];
        if (country === 'Myanmar') {
            cities = myanmarCities.map(city => city.name_en);
        } else if (country === 'Thailand') {
            cities = thailandCities.map(city => city.name_en);
        }

        cities.forEach(city => {
            const opt = document.createElement('option');
            opt.value = city;
            opt.textContent = city;
            citySelect.appendChild(opt);
        });
    });

    // Auto-fill complete address when other address fields change
    const addressFields = ['street', 'township', 'state', 'postal', 'country', 'city'];
    
    addressFields.forEach(field => {
        const element = document.getElementById(field);
        if (element) {
            element.addEventListener('change', updateCompleteAddress);
            element.addEventListener('input', updateCompleteAddress);
        }
    });

    function updateCompleteAddress() {
        const street = document.getElementById('street').value;
        const township = document.getElementById('township').value;
        const state = document.getElementById('state').value;
        const postal = document.getElementById('postal').value;
        const country = document.getElementById('country').value;
        const city = document.getElementById('city').value;
        
        let completeAddress = '';
        
        if (street) completeAddress += street;
        if (township) completeAddress += (completeAddress ? ', ' : '') + township;
        if (state) completeAddress += (completeAddress ? ', ' : '') + state;
        if (city) completeAddress += (completeAddress ? ', ' : '') + city;
        if (country) completeAddress += (completeAddress ? ', ' : '') + country;
        if (postal) completeAddress += (completeAddress ? ' ' : '') + postal;
        
        document.getElementById('complete_address').value = completeAddress;
    }
</script>

</body>
</html>
