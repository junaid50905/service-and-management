import React from "react";
import CustomerSideNav from "../../components/SideNavs/Customer/customerSideNav";
import TopNav from "../../components/TopNavs/Customer/topnav";

const ServiceStatus = () => {
  const products = [
    {
      id: 1,
      serialNumber: "SN12345",
      name: "Laptop",
      model: "Model X1",
      manufacturer: "TechCorp",
      status: "Pending",
      partsUsed: "None",
      delayReason: "",
      maintenanceType: "Scheduled Maintenance",
      maintenanceNotes: "Routine cleaning and software update.",
      maintenancePersonnel: "Alice Johnson",
      maintenancePersonnelPhoto: "alice.jpg",
      maintenancePersonnelCont: "01743217209",
    },
    {
      id: 2,
      serialNumber: "SN67890",
      name: "Smartphone",
      model: "Model S2",
      manufacturer: "MobileTech",
      status: "Finished",
      partsUsed: "Screen replacement, battery upgrade",
      delayReason: "",
      maintenanceType: "Repair",
      maintenanceNotes: "Repaired screen and upgraded battery.",
      maintenancePersonnel: "Bob Smith",
      maintenancePersonnelPhoto: "bob.jpg",
      maintenancePersonnelCont: "01743217209",
    },
    {
      id: 3,
      serialNumber: "SN54321",
      name: "Refrigerator",
      model: "Model FridgeMaster",
      manufacturer: "CoolTech",
      status: "Late",
      partsUsed: "Compressor replacement",
      delayReason: "Supplier delay",
      maintenanceType: "Emergency Repair",
      maintenanceNotes: "Replaced compressor due to failure.",
      maintenancePersonnel: "Elena Rodriguez",
      maintenancePersonnelPhoto: "elena.jpg",
      maintenancePersonnelCont: "01743217209",
    },
    {
      id: 4,
      serialNumber: "SN98765",
      name: "Digital Camera",
      model: "Model SnapShot",
      manufacturer: "PhotoGear",
      status: "Finished",
      partsUsed: "Lens cleaning, firmware update",
      delayReason: "",
      maintenanceType: "Routine Maintenance",
      maintenanceNotes: "Cleaned the lens and updated firmware.",
      maintenancePersonnel: "David Brown",
      maintenancePersonnelPhoto: "david.jpg",
      maintenancePersonnelCont: "01743217209",
    },
    {
      id: 5,
      serialNumber: "SN24680",
      name: "Coffee Maker",
      model: "Model BrewMaster",
      manufacturer: "CafeTech",
      status: "Late",
      partsUsed: "Heating element replacement",
      delayReason: "Supplier delay",
      maintenanceType: "Emergency Repair",
      maintenanceNotes: "Replaced heating element due to malfunction.",
      maintenancePersonnel: "Grace Taylor",
      maintenancePersonnelPhoto: "grace.jpg",
      maintenancePersonnelCont: "01743217209",
    },
    {
      id: 6,
      serialNumber: "SN13579",
      name: "Television",
      model: "Model UltraView",
      manufacturer: "VisionTech",
      status: "Pending",
      partsUsed: "None",
      delayReason: "",
      maintenanceType: "Installation",
      maintenanceNotes: "Installed and configured the TV set.",
      maintenancePersonnel: "James Wilson",
      maintenancePersonnelPhoto: "james.jpg",
      maintenancePersonnelCont: "01743217209",
    },
    {
      id: 7,
      serialNumber: "SN11223",
      name: "Washing Machine",
      model: "Model CleanWash",
      manufacturer: "LaundryTech",
      status: "Late",
      partsUsed: "Pump replacement",
      delayReason: "Supplier delay",
      maintenanceType: "Emergency Repair",
      maintenanceNotes: "Replaced the pump due to a malfunction.",
      maintenancePersonnel: "Olivia Martinez",
      maintenancePersonnelPhoto: "olivia.jpg",
      maintenancePersonnelCont: "01743217209",
    },
    {
      id: 8,
      serialNumber: "SN87654",
      name: "Microwave Oven",
      model: "Model HeatWave",
      manufacturer: "KitchenTech",
      status: "Finished",
      partsUsed: "Magnetron replacement, door latch repair",
      delayReason: "",
      maintenanceType: "Repair",
      maintenanceNotes: "Replaced magnetron and repaired the door latch.",
      maintenancePersonnel: "William Lee",
      maintenancePersonnelPhoto: "william.jpg",
      maintenancePersonnelCont: "01743217209",
    },
    {
      id: 9,
      serialNumber: "SN45678",
      name: "Air Conditioner",
      model: "Model CoolBreeze",
      manufacturer: "ClimateTech",
      status: "Pending",
      partsUsed: "None",
      delayReason: "",
      maintenanceType: "Scheduled Maintenance",
      maintenanceNotes: "Cleaned filters and checked refrigerant levels.",
      maintenancePersonnel: "Sophia Chen",
      maintenancePersonnelPhoto: "sophia.jpg",
      maintenancePersonnelCont: "01743217209",
    },
    {
      id: 10,
      serialNumber: "SN10101",
      name: "Tablet",
      model: "Model TabPro",
      manufacturer: "TechGadget",
      status: "Finished",
      partsUsed: "Battery replacement, screen repair",
      delayReason: "",
      maintenanceType: "Repair",
      maintenanceNotes: "Replaced the battery and repaired the screen.",
      maintenancePersonnel: "Michael Adams",
      maintenancePersonnelPhoto: "michael.jpg",
      maintenancePersonnelCont: "01743217209",
    },
  ];

  products.sort((a, b) => {
    if (a.status === "Late" && b.status !== "Late") {
      return -1;
    }
    if (a.status !== "Late" && b.status === "Late") {
      return 1;
    }
    if (a.status === "Pending" && b.status === "Finished") {
      return -1;
    }
    if (a.status === "Finished" && b.status === "Pending") {
      return 1;
    }
    return 0;
  });
  return (
    <div>
      <TopNav />
      <CustomerSideNav />
      <div className="mx-auto container-box">
        <h1 className="mb-4 text-3xl font-bold text-center text-gray-800">
          Service Maintenance Status
        </h1>
        <div className="grid grid-cols-1 gap-4 p-4 text-gray-800 rounded-md md:grid-cols-1 xl:grid-cols-2">
          {products.map((product) => (
            <div
              key={product.id}
              className="relative p-4 transition duration-300 ease-in-out bg-white shadow-md shadow-gray-400 rounded-xl hover:scale-103"
            >
              <div
                className={`px-4 py-2 text-xl leading-snug rounded-se-xl rounded-es-xl text-white absolute right-0 top-0 w-28 text-center ${getStatusColorClass(
                  product.status
                )} `}
              >
                <p>
                  <span>{product.status}</span>
                </p>
              </div>
              <div className="font-sans ">
                <div className="pr-28">
                  <div>
                    <h2 className="mb-2 font-serif text-2xl font-extrabold text-red-500">
                      {product.maintenanceType}
                    </h2>
                    <h2 className="text-xl font-bold">
                      {product.name} - {product.model}
                    </h2>
                    <h4 className="text-xl font-semibold">
                      Manufacturer: {product.manufacturer}
                    </h4>
                    <h4 className="text-xl font-semibold">
                      Serial Number: {product.serialNumber}
                    </h4>
                  </div>

                  <div className="mt-2 font-serif text-lg">
                    <p>
                      <span className="font-semibold">Parts Used:</span>{" "}
                      {product.partsUsed}
                    </p>
                    {product.status === "Late" && (
                      <p>
                        <span className="font-semibold">Reason for Delay:</span>{" "}
                        {product.delayReason}
                      </p>
                    )}

                    <p>
                      <span className="font-semibold">Maintenance Notes:</span>{" "}
                      {product.maintenanceNotes}
                    </p>
                  </div>
                </div>

                <div className="flex items-center w-full gap-3 mt-4 flex-nowrap">
                  <div className="flex justify-center xl:w-1/2">
                    <img
                      src="https://i.postimg.cc/Jz4r8xz5/User-Avatar-Profile-PNG.png"
                      alt={product.maintenancePersonnel}
                      className="w-48 h-48 bg-gray-800 rounded-full"
                    />
                  </div>
                  <div className="font-serif text-lg xl:w-1/2">
                    <p className="mb-1 font-semibold text-green-800">Maintenance Personnel</p>
                    <p>
                      <span className="font-semibold">Name: </span>
                      {product.maintenancePersonnel}
                    </p>
                    <p>
                      <span className="font-semibold">Contact No:</span>{" "}
                      {product.maintenancePersonnelCont}
                    </p>
                  </div>
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>
    </div>
  );
};

function getStatusColorClass(status) {
  switch (status) {
    case "Pending":
      return "bg-blue-500";
    case "Late":
      return "bg-red-500";
    case "Finished":
      return "bg-green-500";
    default:
      return "bg-gray-500";
  }
}

export default ServiceStatus;
