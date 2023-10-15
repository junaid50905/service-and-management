import React from "react";
import CustomerSideNav from "../../components/SideNavs/Customer/customerSideNav";
import TopNav from "../../components/TopNavs/Customer/topnav";
import AllProducts from "../../components/Products/allProducts";

const ProductsCustomer = () => {
  return (
    <div>
      <TopNav />
      <CustomerSideNav />
      <div className="mx-auto container-box">
        <div className="grid grid-cols-1 gap-16 md:grid-cols-2 xl:grid-cols-3">
          <AllProducts />
        </div>
      </div>
    </div>
  );
};

export default ProductsCustomer;
