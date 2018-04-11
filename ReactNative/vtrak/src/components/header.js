import React from 'react';
import { Text, View } from 'react-native';

const Header = (props) => {
  const { textStyle,
          viewStyle,
          headerContainerStyle } = styles;

  return  (
    <View style={viewStyle}>
      <View style={headerContainerStyle}>
        <Text style={textStyle}>
          {props.headerText}
        </Text>
      </View>
    </View>
  );
};

const styles = {
  viewStyle: {
    backgroundColor: '#76CB89',
    justifyContent: 'center',
    alignItems: 'center',
    height: 65,
    elevation: 2,
    // position: 'relative',
    flexDirection: 'row',
    marginBottom: 10,
  },

  headerContainerStyle: {
    // borderWidth: 2,
    // borderRadius: 5, // rounded corners
    // borderColor: '#000',
    // elevation: 1,
    alignSelf: 'center',
    justifyContent: 'center'
  },

  textStyle: {
    color: '#FFFFFF',
    fontSize: 30,
    // justifyContent: 'center',
    alignItems: 'center',
    justifyContent: 'center',
    fontFamily: 'sansation'
  }
};

export default Header;
