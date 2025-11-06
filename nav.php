<div class="sidebar p-3 text-white" style="width: 250px; height: 100vh; position: fixed; top: 0; left: 0; background-color:rgb(2, 62, 26); overflow-x: hidden; z-index: 1;">
    <h4 class="text-center mb-4 title"> Admin Dashboard</h4>    
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link text-white" href="profile.php?accountID=<?php echo $accountID ?>&login=<?php echo $login; ?>" ><i class="bi bi-person me-2"></i>Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="users.php?accountID=<?php echo $accountID ?> &login=<?php echo $login; ?>"><i class="bi bi-people me-2"></i>User Account</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="active_order.php?accountID=<?php echo $accountID ?> &login=<?php echo $login; ?>"><i class="bi bi-cart-check me-2"></i>Active Order</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="completed_order.php?accountID=<?php echo $accountID ?> &login=<?php echo $login; ?>"><i class="bi bi-cart-dash me-2"></i>Completed Order</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="product.php?accountID=<?php echo $accountID ?> &login=<?php echo $login; ?>"><i class="bi bi-box-seam me-2"></i>Product</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="category.php?accountID=<?php echo $accountID ?> &login=<?php echo $login; ?>"><i class="bi bi-tags me-2"></i>Category</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="discount.php?accountID=<?php echo $accountID ?> &login=<?php echo $login; ?>"><i class="bi bi-percent me-2"></i>Discount Item</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="report.php?accountID=<?php echo $accountID ?> &login=<?php echo $login; ?>"><i class="bi bi-graph-up me-2"></i>Report</a>
        </li>
        <li class="nav-item mt-auto">
            <a class="nav-link text-white" href="log_out.php?accountID=<?php echo $accountID ?> &login=<?php echo $login; ?>"><i class="bi bi-box-arrow-left me-2"></i>Log Out</a>
        </li>
    </ul>
</div>