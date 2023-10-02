import React, { useEffect, useState } from "react";

function GeoLocation() {
  const [latitude, setLatitude] = useState(null);
  const [longitude, setLongitude] = useState(null);
  const [startTime, setStartTime] = useState(null);
  const [stopTime, setStopTime] = useState(null);
  const [activeTime, setActiveTime] = useState(0);
  const [isGeolocationActive, setIsGeolocationActive] = useState(false);

  useEffect(() => {
    if (isGeolocationActive && "geolocation" in navigator) {
      navigator.geolocation.getCurrentPosition(
        function (position) {
          const { latitude, longitude } = position.coords;
          setLatitude(latitude);
          setLongitude(longitude);
          setStartTime(new Date().getTime());
          setStopTime(null); // Reset stop time when geolocation starts
        },
        function (error) {
          console.error("Error getting geolocation:", error);
        }
      );
    } else {
      console.error("Geolocation is not available in your browser.");
      // Clear the start time and stop time when geolocation is not active
      setStartTime(null);
      setStopTime(null);
    }
  }, [isGeolocationActive]);

  useEffect(() => {
    if (startTime && !stopTime) {
      const interval = setInterval(() => {
        const currentTime = new Date().getTime();
        setActiveTime((currentTime - startTime) / 1000); // Calculate active time in seconds
      }, 1000);

      return () => clearInterval(interval);
    }
  }, [startTime, stopTime]);

  const toggleGeolocation = () => {
    if (isGeolocationActive) {
      // If geolocation is currently active, stop it and record the stop time
      setIsGeolocationActive(false);
      setStopTime(new Date().getTime());
    } else {
      // If geolocation is not active, start it and reset stop time
      setIsGeolocationActive(true);
      setStopTime(null);
    }
  };

  return (
    <div>
      <button onClick={toggleGeolocation}>
        {isGeolocationActive ? "Stop Geolocation" : "Start Geolocation"}
      </button>
      {latitude && longitude ? (
        <div>
          <p>Latitude: {latitude}</p>
          <p>Longitude: {longitude}</p>
          <p>Active Time (seconds): {activeTime}</p>
          <p>Start Time: {new Date(startTime).toLocaleString()}</p>
          {stopTime && <p>Stop Time: {new Date(stopTime).toLocaleString()}</p>}
        </div>
      ) : (
        <p>Fetching location...</p>
      )}
    </div>
  );
}

export default GeoLocation;
