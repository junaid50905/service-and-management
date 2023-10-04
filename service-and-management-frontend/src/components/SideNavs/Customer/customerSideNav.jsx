import React from "react";
import { NavLink } from "react-router-dom";
import { AiFillDashboard } from "react-icons/ai";
import { GiAutoRepair } from "react-icons/gi";
import { MdSpatialTracking } from "react-icons/md";
import { FaBarsProgress } from "react-icons/fa6";
import { FcFaq } from "react-icons/fc";
import { FcFinePrint } from "react-icons/fc";
import { FcAbout } from "react-icons/fc";

const CustomerSideNav = () => {
  return (
    <div>
      <div className="fixed h-screen text-center bg-white sidenav text-navColor">
        <nav>
          <ul>
            <li>
              <div className="nav-items">
                <NavLink
                  to="/customer/servprogress"
                  style={({ isActive }) => ({
                    color: isActive ? "#020553" : "#f65522",
                  })}
                >
                  <div className="flex justify-center pt-4">
                    <FaBarsProgress className="w-8 h-8" />
                  </div>
                  <div className="flex justify-center pb-4 mt-1">
                    Servicing Progress
                  </div>
                </NavLink>
              </div>
            </li>
            <li>
              <div className="nav-items">
                <NavLink
                  to="/customer/pursproducts"
                  style={({ isActive }) => ({
                    color: isActive ? "#020553" : "#f65522",
                  })}
                >
                  <div className="flex justify-center pt-4">
                    <GiAutoRepair className="w-8 h-8" />
                  </div>
                  <div className="flex justify-center pb-4 mt-1">
                    Purchased Products
                  </div>
                </NavLink>
              </div>
            </li>
            <li>
              <div className="nav-items">
                <NavLink
                  to="/customer/reqservice/0"
                  style={({ isActive }) => ({
                    color: isActive ? "#020553" : "#f65522",
                  })}
                >
                  <div className="flex justify-center pt-4">
                    <GiAutoRepair className="w-8 h-8" />
                  </div>
                  <div className="flex justify-center pb-4 mt-1">
                    Request Service
                  </div>
                </NavLink>
              </div>
            </li>

            <li>
              <div className="nav-items">
                <NavLink
                  to="/customer/contsupport"
                  style={({ isActive }) => ({
                    color: isActive ? "#020553" : "#f65522",
                  })}
                >
                  <div className="flex justify-center pt-4">
                    <MdSpatialTracking className="w-8 h-8" />
                  </div>
                  <div className="flex justify-center pb-4 mt-1">
                    Contact Support
                  </div>
                </NavLink>
              </div>
            </li>
            {/* <li>
              <div className="nav-items">
                <NavLink
                  to="/TrackManage"
                  style={({ isActive }) => ({
                    color: isActive ? "#020553" : "#f65522",
                  })}
                >
                  <div className="flex justify-center pt-4">
                    <MdSpatialTracking className="w-8 h-8" />
                  </div>
                  <div className="flex justify-center pb-4 mt-1">
                    Complain Box
                  </div>
                </NavLink>
              </div>
            </li> */}
            {/* <li>
              <div className="nav-items">
                <NavLink
                  to="/customer/dashboard"
                  style={({ isActive }) => ({
                    color: isActive ? "#020553" : "#f65522",
                  })}
                >
                  <div className="flex justify-center pt-4">
                    <MdSpatialTracking className="w-8 h-8" />
                  </div>
                  <div className="flex justify-center pb-4 mt-1">
                    Service History
                  </div>
                </NavLink>
              </div>
            </li> */}
            <li>
              <div className="nav-items">
                <NavLink
                  to="/customer/faq"
                  style={({ isActive }) => ({
                    color: isActive ? "#020553" : "#f65522",
                  })}
                >
                  <div className="flex justify-center pt-4">
                    <FcFaq className="w-8 h-8" />
                  </div>
                  <div className="flex justify-center pb-4 mt-1">FAQs</div>
                </NavLink>
              </div>
            </li>

            <li>
              <div className="nav-items">
                <NavLink
                  to="/customer/termsandcondition"
                  style={({ isActive }) => ({
                    color: isActive ? "#020553" : "#f65522",
                  })}
                >
                  <div className="flex justify-center pt-4">
                    <FcFinePrint className="w-8 h-8" />
                  </div>
                  <div className="flex justify-center pb-4 mt-1">
                    Terms and Conditions
                  </div>
                </NavLink>
              </div>
            </li>

            <li>
              <div className="nav-items">
                <NavLink
                  to="/customer/aboutus"
                  style={({ isActive }) => ({
                    color: isActive ? "#020553" : "#f65522",
                  })}
                >
                  <div className="flex justify-center pt-4">
                    <FcAbout className="w-8 h-8" />
                  </div>
                  <div className="flex justify-center pb-4 mt-1">About Us</div>
                </NavLink>
              </div>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  );
};

export default CustomerSideNav;
