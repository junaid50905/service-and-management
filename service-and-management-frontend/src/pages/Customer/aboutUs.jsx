import React from "react";
import CustomerSideNav from "../../components/SideNavs/Customer/customerSideNav";
import TopNav from "../../components/TopNavs/Customer/topnav";

const AboutUs = () => {
  return (
    <div>
      <TopNav />
      <CustomerSideNav />
      <div className="mx-auto container-box font-roboto">
        <div className="max-w-full p-8 mx-auto mt-10 bg-white rounded-lg shadow-md">
          <h1 className="mb-4 text-3xl font-semibold">About Us</h1>
          <p className="text-gray-700">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod
            urna ut dolor bibendum, vel euismod tellus efficitur. Nullam
            venenatis ex nec fermentum. Sed congue odio id sapien tristique, ac
            efficitur dui aliquam. Vivamus sit amet purus quis tortor auctor
            pharetra. Fusce nec diam et enim venenatis tempor ac in velit. Duis
            a metus tincidunt, commodo libero sit amet, bibendum nulla.
          </p>
          <p className="text-gray-700">
            Vestibulum hendrerit leo a lectus facilisis, quis dignissim eros
            pharetra. Maecenas vel mi vel tortor tincidunt interdum id id nisi.
            Nullam malesuada, odio ut lacinia vestibulum, dolor elit faucibus
            lectus, id auctor tellus ligula eget nunc. Proin eleifend volutpat
            velit, eu tincidunt dui. Nulla facilisi. Sed vehicula ante in
            bibendum tincidunt.
          </p>
        
        </div>
      </div>
    </div>
  );
};

export default AboutUs;
