// Import libraries for making a components
import React from 'react';
import { Text } from 'react-native';

// Make the component
const Header = () => {
  const { textStyle } = styles;
  return <Text style={textStyle}>vtrak</Text>;
};

const styles = {
  textStyle: {
    fontSize: 30
  }
};
// Make the component available to other parts of the app
export default Header;