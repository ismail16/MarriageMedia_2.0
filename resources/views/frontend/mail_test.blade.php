
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.css') }}">

    <style>
        #start_time_counter {
            margin-left: 10px;
        }

        .stslbl {
            text-transform: capitalize;
        }

        .hr_sm {
            margin-top: 0;
            margin-bottom: 10px;
        }

        .sidebar {
            background: #0b132b !important;
            height: 100vh !important;
        }

        .sidebar .menu .list a {
            color: #FFF !important;
        }

        div.menu ul.list li a i.fa {
            margin-top: 2px;
        }

        label.noteTag {
            margin-top: 4px;
            font-family: Monospace;
        }

        label.noteTag span.noteTag {
            line-height: 12px;
            background: red;
            padding: 1px 3px;
            color: white;
        }

        input.customFieldLabel {
            border: none;
        }

        input.customFieldLabel {
            border: 1px solid white;
        }

        input.customFieldLabel:HOVER {
            border: 1px solid grey;
        }

        .navbar {
            box-shadow: none !important;
        }

        section.content {
            margin: 60px 0 0 300px !important;
        }

        .select-checkbox {
            position: relative;
        }

        .select-checkbox [type="checkbox"] {
            position: absolute;
            left: 3px;
            margin: 3px 0 0 21px;
            opacity: 1;
            bottom: 12px;
        }

        .mce-branding-powered-by {
            display: none;
        }

        /* #mceu_38 {
                width: 100%;
            } */

        .input-group {
            width: 100%;
        }

        .dataTables_length {
            margin-bottom: 5px;
        }

        div.dataTables_filter {
            padding-right: 0 !important;
        }
    </style>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
    <div class="main-container main-container-custom">
        <div class="card-box mb-30 p-2">
            <div class="pd-10 pl-20 bg-warning mb-20">
                <h4 class="text-white h4 m-0"><i class="fa fa-list"></i> Send Custom Email to Specific Voter</h4>
            </div>
            <div class="row">
                <div class="col-lg-11 mb-5 m-auto">
                    <form name="emailSetupWizardForm" class="electionSetupWizard" id="emailSetupWizardForm" method="POST"
                        enctype="multipart/form-data" novalidate="novalidate" role="application">
                        <div id="listVoters">
                            <div class="form-group form-float">
                                <div class="input-group" style="float: right;">
                                    <div class="">
                                        <label for="email">Email Subject:</label>
                                        <input type="text" class="form-control" id="email_sub" required>
                                    </div><br /><br />
                                    <textarea id="email_content"></textarea></br>
                                    <div class="">
                                        <label for="email">Email address:</label>
                                        <input type="email" class="form-control" id="test_email">
                                    </div>
                                </div>
                            </div>
                            <label id="messageLabel2"
                                class="col-lg-12"style="padding:25px 0; color: silver; font-size: 32px; font-weight: bold; text-align: center;">
                                Select one or more to send this email and click Send</label>
                        </div>
                        <div id="voterListDataTable">
                            <table id="votersList" class="table table-bordered dataTable">
                                <thead>
                                    <tr>
                                        <th>
                                            <input type="checkbox" id="toggleAll">
                                            <label for="toggleAll" style="padding-left: 12px;"></label>
                                        </th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Precinct</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm email_send"> Send </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer-wrap pd-20 mb-20 card-box">
            &copy; 2022 <a href="/" target="_blank">The Voting Vault</a>, All Rights Reserved
        </div>
    </div>


    
    <script type="text/javascript">
        tinymce.init({
    selector: "textarea",
    theme: "modern",
    height: 300,
    menubar: false,
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen lineheight",
        "insertdatetime media nonbreaking save table directionality",
        "emoticons template paste textcolor colorpicker textpattern imagetools", //spellchecker
    ],
    external_plugins: { nanospell: BASE_URL + "/js/plugin.js" },
    nanospell_server: "php", // choose "php" "asp" "asp.net" or "java"
    nanospell_autostart: false,
    //https://stackoverflow.com/questions/2492452/problem-with-insert-update-links-with-tinymce
    relative_urls: false,
    remove_script_host: false,
    //https://www.tinymce.com/docs/configure/url-handling/
    allow_script_urls: false,
    //convert_urls: false,
    fontsize_formats:
        "8pt 9pt 10pt 11pt 12pt 14pt 16pt 18pt 20pt 22pt 24pt 26pt 36pt",
    lineheight_formats:
        "8pt 9pt 10pt 11pt 12pt 14pt 16pt 18pt 20pt 22pt 24pt 26pt 36pt",
    toolbar1:
        "insertfile undo redo | styleselect | bold italic underline | lineheightselect sizeselect fontselect fontsizeselect | alignleft aligncenter alignright alignjustify",
    toolbar2:
        "print preview media image link | bullist numlist outdent indent | forecolor backcolor emoticons", //spellchecker
    spellchecker_wordchar_pattern: /[^\s,\.]+/g,
    image_advtab: true,
    image_caption: true,
    imagetools_toolbar:
        "rotateleft rotateright | flipv fliph | editimage imageoptions",
    browser_spellcheck: true,
    contextmenu: false,

    // enable title field in the Image dialog
    image_title: true,
    // enable automatic uploads of images represented by blob or data URIs
    automatic_uploads: true,
    // add custom filepicker only to Image dialog
    file_picker_types: "image",
    file_picker_callback: function (cb, value, meta) {
        var input = document.createElement("input");
        input.setAttribute("type", "file");
        input.setAttribute("accept", "image/*");

        input.onchange = function () {
            var file = this.files[0];
            var reader = new FileReader();

            reader.onload = function () {
                var id = "blobid" + new Date().getTime();
                var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                var base64 = reader.result.split(",")[1];
                var blobInfo = blobCache.create(id, file, base64);
                blobCache.add(blobInfo);

                // call the callback and populate the Title field with the file name
                cb(blobInfo.blobUri(), { title: file.name });
            };
            reader.readAsDataURL(file);
        };

        input.click();
    },
});

    </script>
</body>
</html>

  
