
    function onlyOne(checkbox) {
    var checkboxes = document.getElementsByName('check')
    checkboxes.forEach((item) => {
    if (item !== checkbox) item.checked = false
    })
    }
    </script>
    <script>
    function onlyOnes(checkbox) {
    var checkboxes = document.getElementsByName('check2')
    checkboxes.forEach((item) => {
    if (item !== checkbox) item.checked = false
    })
    }
    </script>
    <script>
    function onlyOne2(checkbox) {
    var checkboxes = document.getElementsByName('check3')
    checkboxes.forEach((item) => {
    if (item !== checkbox) item.checked = false
    })
    }
