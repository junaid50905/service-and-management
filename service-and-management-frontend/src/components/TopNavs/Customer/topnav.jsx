import React from "react";
import { Link, useNavigate } from "react-router-dom";
import { BiLogOut } from "react-icons/bi";
import aamraLogo from "../../../assets/images/aamra-logo.png";
import { removeToken } from "../../../services/localStorageService";
import { useLogoutUserMutation } from "../../../services/userAuthApi";

const TopNav = () => {
  const navigate = useNavigate();
  const [logoutUser] = useLogoutUserMutation();
  const handleLogout = async () => {
    const response = await logoutUser({ token });
    console.log(response);
    if (response.data) {
      if (response.data.status === "success") {
        removeToken("token");
        setUserData({
          email: "",
        });
        navigate("/login");
        console.log("success");
      }
    }
  };
  return (
    <div className="fixed h-16 text-white bg-[#333333] topnav">
      <nav className="h-full">
        <ul className="flex items-center justify-between h-full mx-4">
          <li className="ml-8">
            <Link to="/customer/servprogress">
              <img src={aamraLogo} alt="logo" />
            </Link>
          </li>
          <li>
            <div className="flex gap-8">
              <div className="text-xl">
                <Link to="/customer/servprogress">Eastern Bank PLC</Link>
              </div>
              <div className="w-6">
                <button onClick={handleLogout} className="w-full h-full">
                  <BiLogOut className="w-full h-full" />
                </button>
              </div>
            </div>
          </li>
        </ul>
      </nav>
    </div>
  );
};

export default TopNav;
