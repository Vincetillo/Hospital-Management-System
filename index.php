<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cagayan Hospital | Login & Register</title>
    <link rel="stylesheet" href="indexphps/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        .forms-container {
            min-height: 650px; 
            transition: min-height 0.4s ease-in-out;
        }
      
        #militaryFields { display: none; }
        #suffixWrapper { display: none; }
        #officeWrapper { display: none; } 
    </style>
</head>
<body>
    <div class="slideshow">
        <div class="slides">
            <div class="slide active">
                <img src="indexphps/hospital1.jpg" alt="Cagayan Ospital Facility">
            </div>
            <div class="slide">
                <img src="indexphps/hospital2.jpg" alt="Medical Team">
            </div>
            <div class="slide">
                <img src="indexphps/hospital3.jpg" alt="Patient Care">
            </div>
        </div>
        <div class="overlay"></div>
    </div>

    <header class="main-header">
        <div class="header-content">
            <div class="logo-container">
                <div class="logo-icon">
                    <i class="fas fa-hospital"></i>
                </div>
                <div class="logo-text">
                    <h1 class="hospital-name">Cagayan Hospital</h1>
                    <p class="hospital-tagline">Serving with Compassion and Excellence</p>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="form-container">
            <div class="welcome-section">
                <h2><i class="fas fa-user-circle"></i> Cagayan Hospital</h2>
                <p>Access the hospital management system for patients and staff</p>
            </div>

            <div class="form-box">
                <div class="button-box">
                    <div id="btn"></div>
                    <button type="button" class="toggle-btn" onclick="showLogin()">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </button>
                    <button type="button" class="toggle-btn" onclick="showRegister()">
                        <i class="fas fa-user-plus"></i> Register
                    </button>
                </div>

                <div class="forms-container">
                    
                    <form id="login" action="indexphps/process.php" method="POST" class="input-group active">
                        <div class="form-header">
                            <h3><i class="fas fa-lock"></i> Secure Login</h3>
                            <p>Enter your credentials to access the system</p>
                        </div>
                        
                        <div class="input-wrapper">
                            <i class="fas fa-id-card"></i>
                            <input type="text" name="serial_number" class="input-field" placeholder="Enter Serial Number" required>
                        </div>
                        
                        <div class="form-footer">
                            <button type="submit" name="login_user" class="submit-btn">
                                <i class="fas fa-sign-in-alt"></i> Login
                            </button>
                            <p class="help-text">
                                <i class="fas fa-info-circle"></i> Contact admin if you forgot your Serial Number
                            </p>
                        </div>
                    </form>

                    <form id="register" action="indexphps/process.php" method="POST" class="input-group">
                        <div class="form-header">
                            <h3><i class="fas fa-user-plus"></i> Patient Registration</h3>
                            <p>Create your specific account</p>
                        </div>
                        
                        <div class="input-wrapper">
                            <i class="fas fa-users-cog"></i>
                            <select name="registration_type" id="regType" class="input-field" required onchange="toggleFields()">
                                <option value="" disabled selected>Select Registration Type</option>
                                <option value="ENLISTED PERSONNEL">Enlisted Personnel</option>
                                <option value="OFFICER">Officer</option>
                                <option value="CIVILIAN">Civilian</option>
                            </select>
                        </div>

                        <div class="input-wrapper">
                            <i class="fas fa-id-card"></i>
                            <input type="text" name="serial_number" id="serial_number" class="input-field" placeholder="Serial Number" required>
                        </div>

                        <div id="militaryFields">
                            <div class="input-wrapper">
                                <i class="fas fa-star"></i>
                                <select name="rank" id="rank" class="input-field">
                                    <option value="" disabled selected>Select Rank</option>
                                    <option value="GEN">GEN</option><option value="LTGEN">LTGEN</option><option value="MGEN">MGEN</option>
                                    <option value="BGEN">BGEN</option><option value="COL">COL</option><option value="LTC">LTC</option>
                                    <option value="MAJ">MAJ</option><option value="CPT">CPT</option><option value="1LT">1LT</option>
                                    <option value="2LT">2LT</option><option value="CMS">CMS</option><option value="P2LT">P2LT</option>
                                    <option value="SMS">SMS</option><option value="MSG">MSG</option><option value="TSG">TSG</option>
                                    <option value="SSG">SSG</option><option value="SGT">SGT</option><option value="CPL">CPL</option>
                                    <option value="PFC">PFC</option><option value="PVT">PVT</option><option value="CADET">CADET</option>
                                    <option value="CS">CS</option>
                                </select>
                            </div>

                            <div class="input-wrapper">
                                <i class="fas fa-building"></i>
                                <select name="unit" id="unit" class="input-field" onchange="toggleOffice()">
                                    <option value="" disabled selected>Select Unit</option>
                                    <option value="HSG">HSG</option> <option value="401Bde">401Bde</option><option value="402Bde">402Bde</option>
                                    <option value="403Bde">403Bde</option><option value="901Bde">901Bde</option><option value="58IB">58IB</option>
                                    <option value="8IB">8IB</option><option value="75IB">75IB</option><option value="88IB">88IB</option>
                                    <option value="23IB">23IB</option><option value="26IB">26IB</option><option value="29IB">29IB</option>
                                    <option value="30IB">30IB</option><option value="36IB">36IB</option><option value="65IB">65IB</option>
                                    <option value="28IB">28IB</option><option value="TF ORO">TF ORO</option><option value="SSBn">SSBn</option>
                                    <option value="4MIB">4MIB</option><option value="CESH">CESH</option><option value="10RCDG">10RCDG</option>
                                    <option value="10FSSU">10FSSU</option><option value="10FPAO">10FPAO</option><option value="104CO">104CO</option>
                                    <option value="136Dental">136Dental</option><option value="10FSU">10FSU</option><option value="MIG10">MIG10</option>
                                    <option value="10ISU">10ISU</option><option value="4SBn">4SBn</option><option value="4FAB">4FAB</option>
                                    <option value="4LAC">4LAC</option><option value="DPGAO">DPGAO</option><option value="CPO">CPO</option>
                                    <option value="DVAO">DVAO</option><option value="COA">COA</option><option value="OTHERS">OTHERS</option>
                                </select>
                            </div>

                            <div class="input-wrapper" id="officeWrapper">
                                <i class="fas fa-sitemap"></i>
                                <select name="office" id="office" class="input-field">
                                    <option value="" disabled selected>Select Office</option>
                                    <option value="ODC">ODC</option>
                                    <option value="ADC">ADC</option>
                                    <option value="ACRRA">ACRRA</option>
                                    <option value="ADC OPN">ADC OPN</option>
                                    <option value="OCS">OCS</option>
                                    <option value="ODIG">ODIG</option>
                                    <option value="GSMO">GSMO</option>
                                    <option value="0G1">0G1</option>
                                    <option value="0G2">0G2</option>
                                    <option value="0G3">0G3</option>
                                    <option value="0G4">0G4</option>
                                    <option value="OG6">OG6</option>
                                    <option value="OG7">OG7</option>
                                    <option value="OG8">OG8</option>
                                    <option value="OG10">OG10</option>
                                    <option value="ODA">ODA</option>
                                    <option value="JAG01">JAG01</option>
                                    <option value="ODPM">ODPM</option>
                                    <option value="PDS">PDS</option>
                                    <option value="GADO">GADO</option>
                                    <option value="OESPA">OESPA</option>
                                    <option value="DPA0">DPA0</option>
                                    <option value="DSM">DSM</option>
                                    <option value="SDO">SDO</option>
                                    <option value="DCAO">DCAO</option>
                                    <option value="CHAPLAIN">CHAPLAIN</option>
                                </select>
                            </div>

                            <div class="row">
                                <div class="input-wrapper">
                                    <i class="fas fa-briefcase-medical"></i>
                                    <input type="text" name="AFPOS" id="AFPOS" class="input-field" placeholder="AFP MOS">
                                </div>
                                <div class="input-wrapper">
                                    <i class="fas fa-stethoscope"></i>
                                    <input type="text" name="BOS" id="BOS" class="input-field" placeholder="Branch of Service">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-wrapper">
                                <i class="fas fa-user"></i>
                                <input type="text" name="firstname" class="input-field" placeholder="First Name" required>
                            </div>
                            <div class="input-wrapper">
                                <i class="fas fa-user"></i>
                                <input type="text" name="lastname" class="input-field" placeholder="Last Name" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-wrapper">
                                <i class="fas fa-user"></i>
                                <input type="text" name="middle_name" class="input-field" placeholder="Middle Name">
                            </div>
                            <div class="input-wrapper" id="suffixWrapper">
                                <i class="fas fa-tag"></i>
                                <input type="text" name="suffix" id="suffix" class="input-field" placeholder="Suffix">
                            </div>
                        </div>

                        <div class="input-wrapper">
                            <i class="fas fa-map-marker-alt"></i>
                            <input type="text" name="address" class="input-field" placeholder="Address" required>
                        </div>

                        <div class="input-wrapper">
                            <i class="fas fa-phone"></i>
                            <input type="text" name="contact_number" class="input-field" placeholder="Contact Number" required>
                        </div>

                        <div class="input-wrapper">
                            <i class="fas fa-clipboard-list"></i>
                            <select name="purpose" class="input-field" required>
                                <option value="" disabled selected>Select Purpose</option>
                                <option value="RRT">RRT</option>
                                <option value="APE">APE</option>
                                <option value="PROMOTION">PROMOTION</option>
                                <option value="SCHOOLING">SCHOOLING</option>
                                <option value="OTHERS">OTHERS</option>
                            </select>
                        </div>
                        
                        <div class="form-footer">
                            <button type="submit" name="register_user" class="submit-btn">
                                <i class="fas fa-user-plus"></i> Register Account
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="features">
                <div class="feature">
                    <i class="fas fa-heartbeat"></i>
                    <h4>Quality Care</h4>
                </div>
                <div class="feature">
                    <i class="fas fa-users"></i>
                    <h4>Expert Team</h4>
                </div>
                <div class="feature">
                    <i class="fas fa-clock"></i>
                    <h4>24/7 Service</h4>
                </div>
            </div>
        </div>
    </div>

    <script>
        const loginForm = document.getElementById('login');
        const registerForm = document.getElementById('register');
        const sliderBtn = document.getElementById('btn');
        const formContainer = document.querySelector('.forms-container');

             function toggleFields() {
            const regType = document.getElementById('regType').value;
            const militaryDiv = document.getElementById('militaryFields');
            const suffixWrapper = document.getElementById('suffixWrapper');
            
            const rankInput = document.getElementById('rank');
            const unitInput = document.getElementById('unit');
            const bosInput = document.getElementById('BOS');
            const afposInput = document.getElementById('AFPOS'); 
            const suffixInput = document.getElementById('suffix');

            
            const officeWrapper = document.getElementById('officeWrapper');
            const officeInput = document.getElementById('office');

            if (regType === 'OFFICER' || regType === 'ENLISTED PERSONNEL') {
                militaryDiv.style.display = 'block';
                suffixWrapper.style.display = 'block';

                rankInput.setAttribute('required', 'required');
                unitInput.setAttribute('required', 'required');
                bosInput.setAttribute('required', 'required'); 
                
                
                toggleOffice();
            } 
            else {
                
                militaryDiv.style.display = 'none';
                suffixWrapper.style.display = 'none';
                
                
                officeWrapper.style.display = 'none';
                officeInput.removeAttribute('required');

                rankInput.removeAttribute('required');
                unitInput.removeAttribute('required');
                bosInput.removeAttribute('required');
                
                
                rankInput.value = "";
                unitInput.value = "";
                bosInput.value = "";
                afposInput.value = "";
                suffixInput.value = "";
                officeInput.value = "";
            }
        }

               function toggleOffice() {
            const unitVal = document.getElementById('unit').value;
            const officeWrapper = document.getElementById('officeWrapper');
            const officeInput = document.getElementById('office');

            if (unitVal === 'HSG') {
                officeWrapper.style.display = 'block';
                officeInput.setAttribute('required', 'required');
            } else {
                officeWrapper.style.display = 'none';
                officeInput.removeAttribute('required');
                officeInput.value = ""; 
            }
        }

        function adjustHeight(isRegister) {
            if (isRegister) {
                if (window.innerWidth <= 768) {
                    formContainer.style.minHeight = "1550px";
                } else {
                    formContainer.style.minHeight = "1350px"; 
                }
            } else {
                formContainer.style.minHeight = "650px";
            }
        }

        function showLogin() {
            sliderBtn.style.left = "0";
            loginForm.classList.add('active');
            registerForm.classList.remove('active');
            adjustHeight(false); 
        }
        
        function showRegister() {
            sliderBtn.style.left = "50%";
            registerForm.classList.add('active');
            loginForm.classList.remove('active');
            toggleFields(); 
            adjustHeight(true); 
        }
        
        window.onload = function() {
            showLogin();
            toggleFields(); 
        };

               let slideIndex = 0;
        const slides = document.querySelectorAll('.slide');
        function showSlides() {
            slides.forEach(slide => slide.classList.remove('active'));
            slideIndex++;
            if (slideIndex > slides.length) { slideIndex = 1; }
            slides[slideIndex - 1].classList.add('active');
            setTimeout(showSlides, 5000);
        }
        showSlides();
    </script>
</body>
</html>