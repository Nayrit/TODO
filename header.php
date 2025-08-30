<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Nayrit's TODO</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<style>
/* --- Variables & Base Styles --- */
:root {
    --primary-bg: #0d1117;
    --secondary-bg: #161b22;
    --tertiary-bg: #21262d;
    --text-color: #c9d1d9;
    --heading-color: #e6edf3;
    --accent-color: #2ea043;
    --accent-hover: #238636;
    --danger-color: #f85149;
    --danger-hover: #da3633;
    --border-color: #30363d;
    --link-color: #58a6ff;
    --sidebar-gradient: linear-gradient(180deg, #161b22 0%, #0d1117 100%);
}

body {
    font-family: 'Poppins', sans-serif;
    background-color: var(--primary-bg) !important;
    color: var(--text-color);
    line-height: 1.6;
}

h1, h2, h3, h4, h5, h6 {
    color: var(--heading-color);
}

/* --- Sidebar & Navigation --- */
#sidebar {
    min-width: 250px;
    max-width: 250px;
    background: var(--sidebar-gradient);
    color: #fff;
    transition: all 0.3s ease-in-out;
    position: relative;
    border-right: 1px solid var(--border-color);
    box-shadow: 2px 0 10px rgba(0,0,0,0.3);
}

#sidebar.active {
    margin-left: -250px;
}

#sidebar .logo {
    font-weight: 600;
    color: var(--heading-color);
    font-size: 1.5rem;
    padding: 20px 0;
    text-align: middle;
    border-bottom: 1px solid rgba(255,255,255,0.05);
}

#sidebar .custom-menu {
    display: inline-block;
    position: absolute;
    top: 15px;
    right: 0;
    margin-right: -25px;
    transition: 0.3s;
}

#sidebar .custom-menu .btn {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    background: var(--accent-color) !important;
    border: none !important;
    box-shadow: 0 2px 5px rgba(0,0,0,0.3);
}
#sidebar .custom-menu .btn:hover {
    background: var(--accent-hover) !important;
    box-shadow: 0 4px 8px rgba(0,0,0,0.4);
    transform: scale(1.05);
}

/* --- NEW: Aesthetic Sidebar Navigation --- */
#sidebar ul.components {
    padding: 15px 0;
    border-bottom: 1px solid var(--border-color);
}
#sidebar ul li a {
    padding: 15px 20px;
    font-size: 1rem;
    display: flex;
    align-items: center;
    color: var(--text-color);
    transition: all 0.2s ease-in-out;
    border-left: 3px solid transparent;
}
#sidebar ul li a:hover {
    color: #fff;
    background: var(--tertiary-bg);
    border-left: 3px solid var(--accent-color);
}
#sidebar ul li.active > a {
    background: var(--tertiary-bg);
    color: #fff;
    border-left: 3px solid var(--accent-color);
}
#sidebar ul li a i {
    margin-right: 15px;
    font-size: 1.2rem;
    width: 20px;
    text-align: center;
}

/* --- Main Content Area --- */
#content {
    width: 100%;
    padding: 30px;
    min-height: 100vh;
    transition: all 0.3s;
    background-color: var(--primary-bg);
}

.container.mt-5 .row .col-md-12 {
    background-color: var(--secondary-bg);
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.5);
    border: 1px solid var(--border-color);
}

/* --- Table Styling --- */
.table-responsive {
    background-color: var(--secondary-bg);
    border-radius: 8px;
    padding: 1rem;
    box-shadow: 0 4px 15px rgba(0,0,0,0.4) !important;
    border: 1px solid var(--border-color);
}
.table { color: var(--text-color); border-color: var(--border-color); }
.table thead th {
    border-bottom: 2px solid var(--accent-color);
    background-color: var(--tertiary-bg) !important;
    color: var(--heading-color);
    padding: 15px 10px;
    font-weight: 600;
}
.table tbody tr { border-top: 1px solid var(--border-color); transition: background-color 0.2s ease; }
.table tbody tr:hover { background-color: var(--tertiary-bg); }
.table td { padding: 12px 10px; vertical-align: center; }
.table .form-check-input { width: 1.25em; height: 1.25em; border-color: var(--border-color); background-color: var(--tertiary-bg); cursor: pointer; }
.table .form-check-input:checked { background-color: var(--accent-color); border-color: var(--accent-color); }
.table .form-check-input:focus { box-shadow: 0 0 0 0.25rem rgba(46, 160, 67, 0.25); }

/* --- Button Styling --- */
.btn {
    border-radius: 25px;
    padding: 10px 25px;
    font-weight: 600;
    transition: all 0.3s ease;
    text-transform: uppercase;
    font-size: 0.85rem;
    letter-spacing: 0.5px;
    margin: 5px;
}
.btn-primary { background: var(--accent-color) !important; border-color: var(--accent-color) !important; }
.btn-primary:hover { background: var(--accent-hover) !important; border-color: var(--accent-hover) !important; transform: translateY(-2px); box-shadow: 0 6px 15px rgba(46, 160, 67, 0.4); }
.btn-danger { background: var(--danger-color) !important; border-color: var(--danger-color) !important; }
.btn-danger:hover { background: var(--danger-hover) !important; border-color: var(--danger-hover) !important; transform: translateY(-2px); box-shadow: 0 6px 15px rgba(248, 81, 73, 0.4); }
.btn-success { background: #28a745 !important; border-color: #28a745 !important; }
.btn-success:hover { background: #218838 !important; border-color: #1e7e34 !important; transform: translateY(-2px); box-shadow: 0 6px 15px rgba(40, 167, 69, 0.4); }
.table .btn-xs { padding: 5px 10px; font-size: 0.75rem; border-radius: 15px; }
.table .btn-xs i { font-size: 1rem; }

/* --- Modal Styling --- */
.modal-content { background-color: var(--secondary-bg); color: var(--text-color); border: 1px solid var(--border-color); border-radius: 10px; box-shadow: 0 8px 25px rgba(0,0,0,0.6); }
.modal-header { border-bottom: 1px solid var(--border-color); background: var(--tertiary-bg); border-top-left-radius: 10px; border-top-right-radius: 10px; padding: 15px 20px; }
.modal-title { color: var(--heading-color); font-size: 1.3rem; font-weight: 600; }
.modal-header .close { color: var(--text-color); opacity: 0.7; transition: opacity 0.2s ease; }
.modal-header .close:hover { opacity: 1; }
.modal-body { padding: 20px; }
.modal-footer { border-top: 1px solid var(--border-color); background: var(--tertiary-bg); border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; padding: 15px 20px; }

/* --- Form Control Styling --- */
.form-control { background-color: var(--tertiary-bg) !important; color: var(--text-color) !important; border: 1px solid var(--border-color) !important; border-radius: 6px; padding: 12px 15px; transition: border-color 0.2s ease, box-shadow 0.2s ease; }
.form-control::placeholder { color: rgba(201, 209, 217, 0.5); }
.form-control:focus { border-color: var(--link-color) !important; box-shadow: 0 0 0 0.2rem rgba(88, 166, 255, 0.25) !important; background-color: var(--secondary-bg) !important; }
hr { border-top: 1px solid var(--border-color); margin-top: 1.5rem; margin-bottom: 1.5rem; }
.form-check-input.check1 { width: 1.3em; height: 1.3em; border: 2px solid var(--border-color); border-radius: 5px; cursor: pointer; background-color: var(--tertiary-bg); transition: all 0.2s ease; -webkit-appearance: none; -moz-appearance: none; appearance: none; vertical-align: middle; }
.form-check-input.check1:checked { background-color: var(--accent-color); border-color: var(--accent-color); background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='none' stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='M6 10l3 3l6-6'/%3e%3c/svg%3e"); background-size: 100% 100%; background-position: center; background-repeat: no-repeat; }
.form-check-input.check1:focus { box-shadow: 0 0 0 0.25rem rgba(46, 160, 67, 0.25); outline: 0; }
.t { transition: text-decoration 0.3s ease; }

/* --- Responsive Adjustments --- */
@media (max-width: 991.98px) { #sidebar { margin-left: -250px; } #sidebar.active { margin-left: 0; } #sidebar .custom-menu { margin-right: -55px !important; top: 10px !important; } #content { padding: 20px; } .btn { padding: 8px 18px; font-size: 0.8rem; } }
</style>
<body>
</body>
</html>