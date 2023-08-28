document.addEventListener("DOMContentLoaded", function() {
    const editButtons = document.querySelectorAll(".edit-button");
    const editForm = document.getElementById("edit-form");
    const saveEditButton = document.getElementById("save-edit");
    const cancelEditButton = document.getElementById("cancel-edit");

    let currentInternCIN; 

    editButtons.forEach(button => {
        button.addEventListener("click", function() {
            currentInternCIN = parseInt(this.getAttribute("data-id"));
            fetchInternData(currentInternCIN);
            editForm.classList.remove("hidden");
        });
    });

    cancelEditButton.addEventListener("click", function() {
        editForm.classList.add("hidden");
    });

    saveEditButton.addEventListener("click", function() {
        const updatedData = {
            first_name: document.getElementById("edit-first-name").value,
            last_name: document.getElementById("edit-last-name").value,
            cin: document.getElementById("edit-cin").value,
            speciality: document.getElementById("edit-speciality").value,
            start_date: document.getElementById("edit-startDate").value,
            end_date: document.getElementById("edit-endDate").value,
            internship_type: document.getElementById("edit-internshipType").value,
        
            
        };
        console.log(updatedData);

        
        updateInternData(updatedData.cin, updatedData);
        location.reload();
    });

    function fetchInternData(cin) {
        fetch(`getInternData.php?cin=${cin}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById("edit-first-name").value = data.first_name;
                document.getElementById("edit-last-name").value = data.last_name;
                document.getElementById("edit-cin").value = data.cin;
                document.getElementById("edit-speciality").value = data.speciality;
                document.getElementById("edit-startDate").value = data.start_date;
                document.getElementById("edit-endDate").value = data.end_date;
                document.getElementById("edit-internshipType").value = data.internship_type;
            })
            .catch(error => {
                console.error("Error:", error);
            });
    }

    function updateInternData(cin, updatedData) {
        console.log(JSON.stringify(updatedData))
        fetch(`updateIntern.php?cin=${cin}`, {
            method: "POST",
            body: JSON.stringify(updatedData),
            headers: {
                "Content-Type": "application/json"
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
                // Reload the page or update the table as needed
                location.reload();
            } else {
                alert(data.message);
                
            }
        })
        .catch(error => {
            console.error("Error:", error);
            
        });
    }
});
