function confirmPatientAction(action) {

    if (action === "paid") {
        return confirm("Are you sure you want to mark this patient's bill as paid?");
    }
    if (action === "activate") {
        return confirm("Are you sure you want to activate this patient account?");
    }
    if (action === "deactivate") {
        return confirm("Are you sure you want to deactivate this patient account?");
    }
    return true;
}