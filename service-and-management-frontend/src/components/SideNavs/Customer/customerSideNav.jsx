import React from "react";
import { NavLink } from "react-router-dom";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import aamraLogo from "../../../assets/images/aamra-logo.png";
import { Link } from "react-router-dom";
import {
  faSpinner,
  faHistory,
  faBoxesStacked,
  faHandshakeAngle,
  faSquarePhone,
  faCircleQuestion,
  faFileContract,
  faCircleInfo,
} from "@fortawesome/free-solid-svg-icons";

const CustomerSideNav = () => {
  return (
    <div>
      <div
        className="fixed h-screen text-center text-gray-800 bg-[#0675C1] sidenav font-roboto z-50"
        id="scrollbar"
      >
        <div className="w-full p-3">
          <div className="p-2 px-12 bg-white rounded-md shadow-md">
            <Link to="/customer/servprogress">
              <img src={aamraLogo} alt="logo" />
            </Link>
          </div>
        </div>
        <div className="w-full p-3">
          <Link to="#">
            <div className="p-2 px-12 ">
              <img
                src="https://i.postimg.cc/4NBjCXXX/BRAC-Bank-Limited-logo.png"
                alt="logo"
                className="rounded-full shadow-md"
              />
            </div>
            <div className="mt-2 text-xl font-bold text-white ">
              <h2>Brac Bank Ltd</h2>
            </div>
          </Link>
        </div>
        <nav className="p-4 navbar-section">
          <ul className="navbar-list">
            <li>
              <NavLink className="nav-style" to="/customer/servprogress">
                <div>
                  <span className="nav-icon">
                    <FontAwesomeIcon icon={faSpinner} />
                  </span>
                  <span className="pl-3 nav-text">Servicing Progress</span>
                </div>
              </NavLink>
            </li>
            <li>
              <NavLink className=" nav-style" to="/customer/pursproducts">
                <div>
                  <span className="nav-icon">
                    <FontAwesomeIcon icon={faBoxesStacked} />
                  </span>
                  <span className="pl-3 nav-text">Purchased Products</span>
                </div>
              </NavLink>
            </li>
            <li>
              <div>
                <NavLink className="nav-style" to="/customer/reqservice/0">
                  <div>
                    <span className="nav-icon">
                      <FontAwesomeIcon icon={faHandshakeAngle} />
                    </span>
                    <span className="pl-3 nav-text">Request Service</span>
                  </div>
                </NavLink>
              </div>
            </li>
            <li>
              <NavLink className="nav-style" to="/customer/servhistory">
                <div>
                  <span className="nav-icon">
                    <FontAwesomeIcon icon={faHistory} />
                  </span>
                  <span className="pl-3 nav-text">Service History</span>
                </div>
              </NavLink>
            </li>
            <li>
              <NavLink className="nav-style" to="/customer/contsupport">
                <div>
                  <span className="nav-icon">
                    <FontAwesomeIcon icon={faSquarePhone} />
                  </span>
                  <span className="pl-3 nav-text">Contact Support</span>
                </div>
              </NavLink>
            </li>
            <li>
              <NavLink className="nav-style" to="/customer/faq">
                <div>
                  <span className="nav-icon">
                    <FontAwesomeIcon icon={faCircleQuestion} />
                  </span>
                  <span className="pl-3 nav-text">FAQs</span>
                </div>
              </NavLink>
            </li>
            <li>
              <NavLink className="nav-style" to="/customer/termsandcondition">
                <div>
                  <span className="nav-icon">
                    <FontAwesomeIcon icon={faFileContract} />
                  </span>
                  <span className="pl-3 nav-text">Terms and Conditions</span>
                </div>
              </NavLink>
            </li>
            <li>
              <NavLink className="nav-style" to="/customer/aboutus">
                <div>
                  <span className="nav-icon">
                    <FontAwesomeIcon icon={faCircleInfo} />
                  </span>
                  <span className="pl-3 nav-text">About Us</span>
                </div>
              </NavLink>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  );
};

export default CustomerSideNav;
