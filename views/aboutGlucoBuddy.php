
<style>
      
/* General styles */
html, body {
    margin: 0;
    padding: 0;
    width: 100%;
    overflow-x: hidden; /* Prevent horizontal overflow */
}

.container {
    max-width: 100%;
    padding: 0 15px; /* Add padding to prevent content from touching edges on mobile */
    box-sizing: border-box;
}

/* Heading styles */
h2 {
    color: #007bff;
    font-size: 1.5rem; /* Responsive font size */
}

h3 {
    color: #17a2b8;
    font-size: 1.25rem; /* Responsive font size */
}

h4 {
    color: #17a2b8;
    font-size: 1.125rem; /* Responsive font size */
}

/* General text and list styles */
p {
    font-size: 1rem; /* Ensure text is legible */
}

ul, ol {
    padding-left: 1.5rem; /* Adjust padding for lists */
}

li {
    margin-bottom: 0.5rem; /* Add spacing between list items */
}

strong {
    display: block; /* Make strong elements block for better readability */
    margin-top: 0.5rem; /* Add spacing above strong elements */
}

/* Responsive videos */
iframe {
    max-width: 100%;
    height: auto; /* Maintain aspect ratio */
}

/* Adjustments for small screens */
@media (max-width: 768px) {
    h2 {
        font-size: 1.25rem; /* Smaller font size for smaller screens */
    }

    h3 {
        font-size: 1.125rem; /* Smaller font size for smaller screens */
    }

    h4 {
        font-size: 1rem; /* Smaller font size for smaller screens */
    }

    .container {
        padding: 0 10px; /* Adjust padding for smaller screens */
    }

    .row {
        margin-right: 0;
        margin-left: 0;
    }
}

    </style>

<style>
    /* Include the revised CSS styles here */
</style>

<?php if ($this->session->flashdata('contactForm')) { ?>
    <div style="color:green; margin:0px auto; max-width:300px;">
        <?= $this->session->flashdata('contactForm'); ?>
    </div>
<?php } ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-4">What is GlucoBuddy?</h2>

            <h4 class="mt-4">GlucoBuddy is a software that helps monitor blood glucose levels and track steps.</h4>

            <p>GlucoBuddy is a software designed to track key glucose levels like FPG, PPG, HbA1c, and Random,
                as well as monitor steps. It allows users to generate detailed reports between any two dates,
                helping them manage their diabetes more effectively.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <!-- Original content -->
            <h3 class="mt-4">Getting Started with GlucoBuddy: A Step-by-Step Guide</h3>

            <ol>
                <li><strong>Sign Up and Setup:</strong>
                    <ul>
                        <li>Users sign up, log in, and set up their account by adding glucose metrics and daily step counts.</li>
                    </ul>
                </li>
                <li><strong>Daily Tracking:</strong>
                    <ul>
                        <li>The platform allows daily entry of glucose levels and steps, helping users manage their health consistently.</li>
                    </ul>
                </li>
                <li><strong>Trend Viewing and Reporting:</strong>
                    <ul>
                        <li>Users can view trends over time (weekly, monthly, yearly) and generate detailed reports for specific periods.</li>
                    </ul>
                </li>
                <li><strong>Healthcare Support:</strong>
                    <ul>
                        <li>Reports provide healthcare professionals with data to compare glucose levels against recommended ranges, aiding in personalized treatment plans.</li>
                    </ul>
                </li>
            </ol>
        </div>
    </div>
</div>
<br/>